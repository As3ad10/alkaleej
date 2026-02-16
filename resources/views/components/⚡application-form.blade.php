<?php

use App\Models\Course;
use Livewire\Component;
use App\Models\Application;
use App\Models\Institution;
use Illuminate\Support\Collection;
use App\Enums\InstitutionAttributeTypeEnum;

new class extends Component {
    public string $fullname = '';
    public string $id_number = '';
    public string $phone_number = '';
    public ?int $course_id = null;
    public ?string $period = null;
    public ?int $institution_id = null;
    public array $institution_attributes = [];

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
        $rules = [
            'fullname' => 'required|string|max:255',
            'id_number' => 'required|numeric|max:25',
            'phone_number' => 'required|numeric|max:255',
            'course_id' => 'required|integer',
            'institution_id' => 'required|integer',
        ];

        if ($this->course_id && count($this->coursePeriods) > 0) {
            $rules['period'] = 'required|string';
        }

        foreach ($this->institutionAttributesSchema as $attribute) {
            if (!($attribute->is_required ?? false)) {
                continue;
            }

            $rules["institution_attributes.{$attribute->name}"] = 'required';
        }

        $data = $this->validate($rules);

        Application::create($data);
    }
};
?>

<div>
    <form wire:submit="submit" class="flex flex-col gap-4">
        <flux:field>
            <flux:label>{{ __('Fullname') }}</flux:label>
            <flux:input wire:model="fullname" />
            <flux:error name="fullname" />
        </flux:field>
        <flux:field>
            <flux:label>{{ __('ID number') }}</flux:label>
            <flux:input wire:model="id_number" />
            <flux:error name="id_number" />
        </flux:field>
        <flux:field>
            <flux:label>{{ __('Phone number') }}</flux:label>
            <flux:input type="tel" wire:model="phone_number" />
            <flux:error name="phone_number" />
        </flux:field>
        <flux:field>
            <flux:label>{{ __('Courses') }}</flux:label>
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

        @if ($course_id && count($this->coursePeriods) > 0)
            <flux:field>
                <flux:label>{{ __('Course period') }}</flux:label>
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
            <flux:label>{{ __('Institutions') }}</flux:label>
            <flux:select wire:model.live="institution_id">
                <flux:select.option value="" selected>
                    {{ __('Select option') }}
                </flux:select.option>
                @foreach ($institutions as $institution)
                    <flux:select.option value="{{ $institution->id }}">{{ $institution->name }}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:error name="institution_id" />
        </flux:field>

        @if ($institution_id && $this->institutionAttributesSchema->count() > 0)
            @foreach ($this->institutionAttributesSchema as $attribute)
                <flux:field>
                    <flux:label>
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
                                    <flux:select.option value="{{ $option }}">{{ $option }}</flux:select.option>
                                @endforeach
                            </flux:select>
                        @break
                    @endswitch

                    <flux:error name="institution_attributes.{{ $attribute->name }}" />
                </flux:field>
            @endforeach
        @endif
        <flux:button type="submit" variant="primary" color="accent">
            ارسال
        </flux:button>
    </form>
</div>
