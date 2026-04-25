<?php

use App\Enums\InstitutionAttributeTypeEnum;
use App\Models\Application;
use App\Models\Course;
use App\Models\Institution;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Panakour\FilamentFlatPage\Facades\FilamentFlatPage;

new class extends Component {
    public string $fullname = '';
    public string $id_number = '';
    public string $phone_number = '05';
    public ?int $course_id = null;
    public ?string $period = null;
    public ?int $institution_id = null;
    public ?string $title = null;
    public ?string $area = null;

    public array $institution_attributes = [];
    public bool $isSubmitted = false;
    public ?string $pdf = null;

    public Collection $courses;
    public Collection $institutions;

    public function mount()
    {
        $this->courses = Course::active()->get();
        $this->institutions = Institution::active()
            ->with(['attributes' => fn($query) => $query->active()])
            ->get();
    }

    public function updatedCourseId($value)
    {
        $this->period = null;
    }

    public function getCoursePeriodsProperty(): array
    {
        if (!$this->course_id) {
            return [];
        }
        $course = $this->courses->firstWhere('id', (int) $this->course_id);
        return $course ? $course->periods ?? [] : [];
    }

    public function updatedInstitutionId($value)
    {
        $this->institution_attributes = [];
    }

    public function getSelectedInstitutionProperty(): ?Institution
    {
        if (!$this->institution_id) {
            return null;
        }

        return $this->institutions->firstWhere('id', (int) $this->institution_id);
    }

    public function getinstitutionAttributesSchemaProperty(): \Illuminate\Support\Collection
    {
        return $this->selectedInstitution?->attributes?->values() ?? collect();
    }

    public function submit()
    {
        $action = app(\App\Actions\CreatePdfAction::class);

        $rules = [
            'fullname' => 'required|string|max:255',
            'id_number' => 'required|string|max:20|regex:/^\d+$/',
            'phone_number' => 'required|string|regex:/^05[0-9]{8}$/',
            'course_id' => 'required|integer',
            'institution_id' => 'required|integer',
            'area' => 'nullable|string|max:255',
        ];

        if ($this->course_id && count($this->coursePeriods) > 0) {
            $rules['period'] = 'required|string';
        }

        if ($this->institution_id && $this->selectedInstitution) {
            $rules['title'] = 'required|string';
        }

        foreach ($this->institutionAttributesSchema as $attribute) {
            if (!($attribute->is_required ?? false)) {
                continue;
            }

            $rules["institution_attributes.{$attribute->name}"] = 'required';
        }
        $data = $this->validate($rules);

        try {
            $application = Application::create($data);

            $this->pdf = $action->execute('pdf.certificate', 'certificates/' . $application->id . '.pdf', [
                'fullname' => $application->fullname,
                'id_number' => $application->id_number,
                'period' => $application->period,
                'course' => $application->course->name,
                'title' => $application->title,
                'greeting' => $application->institution->pdf_text,
                'area' => $application->area,
            ]);

            $application->update(['pdf' => $this->pdf]);

            // Storage::disk('public')->download(str_replace(env('APP_URL') . '/storage/', __DIR__ . '/../../../storage/', $this->pdf));

            if (app()->environment('production') && FilamentFlatPage::get('settings.json', 'toggle_bot')) {
                \App\Jobs\SendWhatsappDocumentJob::dispatch(
                    $application->phone_number,
                    $this->pdf,
                    "مرحبا {$application->fullname}
                    موافقتك جاهزة، وإذا وصلت الموافقة النهائية، تواصل معي علشان نكمل باقي الإجراءات.
                        وسعدت بخدمتك، وأتمنى لك التوفيق!
                        أخوكم سالم الكثيري",
                );
            }

            $this->isSubmitted = true;
        } catch (\Throwable $th) {
            Log::error('form not submitted: ' . $th->getMessage());
        }
    }
};
?>

<div>
    @if ($isSubmitted)
        <div class="mb-4 rounded border border-green-200 bg-green-50 p-4 text-sm text-green-800">
            {{ __('Your application has been submitted successfully.') }}
        </div>
        <flux:button type="button" :href="$this->pdf" download icon="arrow-down-tray" variant="primary" color="accent">
            اضغط هنا لتحميل ملف pdf
        </flux:button>
    @else
        <form wire:submit="submit" class="flex flex-col gap-4">
            <flux:field>
                <flux:label class="text-white">{{ __('Fullname') }}</flux:label>
                <flux:input wire:model="fullname" />
                <flux:error name="fullname" />
            </flux:field>
            <flux:field>
                <flux:label class="text-white">{{ __('ID number') }}</flux:label>
                <flux:input wire:model="id_number" />
                <flux:error name="id_number" />
            </flux:field>
            <flux:field>
                <flux:label class="text-white">{{ __('Phone number') }}</flux:label>
                <flux:input type="tel" wire:model="phone_number" placeholder="05XXXXXXXX" />
                <flux:error name="phone_number" />
            </flux:field>
            <flux:field>
                <flux:label class="text-white">{{ __('Courses') }}</flux:label>
                <flux:select wire:model.live="course_id">
                    <flux:select.option value="" selected>
                        {{ __('Select option') }}
                    </flux:select.option>
                    @foreach ($courses as $course)
                        <flux:select.option value="{{ $course->id }}">{{ $course->name }}
                            ({{ $course->price > 0 ? $course->price . ' ' . __('SAR') : '' }})
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="course_id" />
            </flux:field>

            @if ($course_id && count($this->coursePeriods) > 0)
                <flux:field>
                    <flux:label class="text-white">{{ __('Period') }}</flux:label>
                    <flux:select wire:model="period">
                        <flux:select.option value="" selected>
                            {{ __('Select option') }}
                        </flux:select.option>
                        @foreach ($this->coursePeriods as $periodOption)
                            <flux:select.option value="{{ $periodOption }}">{{ $periodOption }}</flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="period" />
                </flux:field>
            @endif

            <flux:field>
                <flux:label class="text-white">{{ __('Institutions') }}</flux:label>
                <flux:select wire:model.live="institution_id">
                    <flux:select.option value="" selected>
                        {{ __('Select option') }}
                    </flux:select.option>
                    @foreach ($institutions as $institution)
                        <flux:select.option value="{{ $institution->id }}">{{ $institution->name }}
                        </flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="institution_id" />
            </flux:field>

            @if ($institution_id && $this->selectedInstitution)
                <flux:field>
                    <flux:label class="text-white">{{ __('Job title') }}</flux:label>
                    <flux:select wire:model="title">
                        <flux:select.option value="" selected>
                            {{ __('Select option') }}
                        </flux:select.option>
                        @foreach ($this->selectedInstitution->titles as $title)
                            <flux:select.option value="{{ $title }}">{{ $title }}
                            </flux:select.option>
                        @endforeach
                    </flux:select>
                    <flux:error name="title" />
                </flux:field>
            @endif

            @if ($institution_id && $this->institutionAttributesSchema->count() > 0)
                @foreach ($this->institutionAttributesSchema as $attribute)
                    <flux:field>
                        <flux:label class="text-white">
                            {{ $attribute->name }}
                            @if ($attribute->is_required)
                                <span class="text-red-600">*</span>
                            @endif
                        </flux:label>

                        @switch($attribute->type)
                            @case(InstitutionAttributeTypeEnum::TEXT)
                                <flux:input wire:model="institution_attributes.{{ $attribute->name }}" />
                            @break

                            @case(InstitutionAttributeTypeEnum::DATE)
                                <flux:input type="date" wire:model="institution_attributes.{{ $attribute->name }}" />
                            @break

                            @case(InstitutionAttributeTypeEnum::TEXTAREA)
                                <flux:textarea wire:model="institution_attributes.{{ $attribute->name }}" rows="3" />
                            @break

                            @case(InstitutionAttributeTypeEnum::SELECT)
                                <flux:select wire:model="institution_attributes.{{ $attribute->name }}">
                                    <flux:select.option value="" selected>
                                        {{ __('Select option') }}
                                    </flux:select.option>
                                    @foreach ($attribute->options ?? [] as $option)
                                        <flux:select.option value="{{ $option }}">{{ $option }}
                                        </flux:select.option>
                                    @endforeach
                                </flux:select>
                            @break
                        @endswitch

                        <flux:error name="institution_attributes.{{ $attribute->name }}" />
                    </flux:field>
                @endforeach
            @endif

            <flux:field>
                <flux:label class="text-white">{{ __('Area (optional)') }}</flux:label>
                <flux:input wire:model="area" />
                <flux:error name="area" />
            </flux:field>
            <flux:button type="submit" variant="primary" color="accent">
                ارسال
            </flux:button>
        </form>
    @endif
</div>
