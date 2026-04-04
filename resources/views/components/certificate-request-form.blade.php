<?php

use App\Enums\InstitutionAttributeTypeEnum;
use App\Models\CertificateRequest;
use App\Models\Course;
use App\Models\Institution;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

new class extends Component {
    public string $fullname = '';
    public string $id_number = '';
    public string $phone_number = '05';
    public ?int $course_id = null;
    public ?string $period = null;
    public ?int $institution_id = null;
    public ?string $title = null;

    public bool $isSubmitted = false;

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
        $rules = [
            'fullname' => 'required|string|max:255',
            'id_number' => 'required|string|max:20|regex:/^\d+$/',
            'phone_number' => 'required|string|regex:/^05[0-9]{8}$/',
            'course_id' => 'required|integer',
            'institution_id' => 'required|integer',
            'period' => 'required|string|max:100',
        ];

        if ($this->institution_id && $this->selectedInstitution) {
            $rules['title'] = 'required|string';
        }

        $data = $this->validate($rules);

        // try {
        $certificateRequest = CertificateRequest::create($data);

        $this->isSubmitted = true;
        // } catch (\Throwable $th) {
        //     Log::error('form not submitted: ' . $th->message);
        // }
    }
};
?>

<div>
    @if ($isSubmitted)
        <div class="mb-4 rounded border border-green-200 bg-green-50 p-4 text-sm text-green-800">
            تم تأكيد طلبك لاصدار الشهاده
            وفريقنا سيتولى خدمتك والتواصل معك مباشرة
        </div>
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
                <flux:label class="text-white">{{ __('Course') }}</flux:label>
                <flux:select wire:model.live="course_id">
                    <flux:select.option value="" selected>
                        {{ __('Select option') }}
                    </flux:select.option>
                    @foreach ($courses as $course)
                        <flux:select.option value="{{ $course->id }}">{{ $course->name }} ({{ $course->price }}
                            {{ __('SAR') }})</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="course_id" />
            </flux:field>

            <flux:field>
                <flux:label class="text-white">{{ __('Course period') }}</flux:label>
                <flux:input wire:model="period" />
                <flux:error name="period" />
            </flux:field>

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

            <flux:button type="submit" variant="primary" color="accent">
                ارسال
            </flux:button>
        </form>
    @endif
</div>
