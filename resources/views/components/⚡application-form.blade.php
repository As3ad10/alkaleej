<?php

use App\Models\Course;
use Livewire\Component;
use App\Models\Institution;
use App\Enums\InstitutionAttributeTypeEnum;
use Illuminate\Support\Collection;

new class extends Component {
    public string $fullname = '';
    public string $id_number = '';
    public string $phone_number = '';
    public ?int $course_id = null;
    public ?string $period = null;
    public ?int $institution_id = null;
    public array $institutionAttributes = [];

    public Collection $courses;
    public Collection $institutions;

    public function mount()
    {
        $this->courses = Course::active()->get();
        $this->institutions = Institution::active()
            ->with(['attributes' => fn ($query) => $query->active()])
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
        $this->institutionAttributes = [];
    }

    public function getSelectedInstitutionProperty(): ?Institution
    {
        if (!$this->institution_id) {
            return null;
        }

        return $this->institutions->firstWhere('id', (int) $this->institution_id);
    }

    public function getInstitutionAttributesSchemaProperty(): \Illuminate\Support\Collection
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

            $rules["institutionAttributes.{$attribute->id}"] = 'required';
        }

        $this->validate($rules);
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
            <flux:select wire:model.live="course_id" placeholder="{{ __('Select course') }}">
                @foreach ($courses as $course)
                    <flux:select.option value="{{ $course->id }}">{{ $course->name }} ({{ $course->price }}
                        {{ __('SAR') }})</flux:select.option>
                @endforeach
            </flux:select>
            <flux:error name="courses" />
        </flux:field>

        @if ($course_id && count($this->coursePeriods) > 0)
            <flux:field>
                <flux:label>{{ __('Course period') }}</flux:label>
                <flux:select wire:model="period" placeholder="{{ __('Select period') }}">
                    @foreach ($this->coursePeriods as $periodOption)
                        <flux:select.option value="{{ $periodOption }}">{{ $periodOption }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:error name="period" />
            </flux:field>
        @endif

        <flux:field>
            <flux:label>{{ __('Institutions') }}</flux:label>
            <flux:select wire:model.live="institution_id" placeholder="{{ __('Select institution') }}">
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
                            <flux:input wire:model="institutionAttributes.{{ $attribute->id }}" />
                        @break

                        @case(InstitutionAttributeTypeEnum::DATE)
                            <flux:input type="date" wire:model="institutionAttributes.{{ $attribute->id }}" />
                        @break

                        @case(InstitutionAttributeTypeEnum::TEXTAREA)
                            <flux:textarea wire:model="institutionAttributes.{{ $attribute->id }}" rows="3" />
                        @break

                        @case(InstitutionAttributeTypeEnum::SELECT)
                            <flux:select wire:model="institutionAttributes.{{ $attribute->id }}"
                                placeholder="{{ __('Select option') }}">
                                @foreach (($attribute->options ?? []) as $option)
                                    <flux:select.option value="{{ $option }}">{{ $option }}</flux:select.option>
                                @endforeach
                            </flux:select>
                        @break
                    @endswitch

                    <flux:error name="institutionAttributes.{{ $attribute->id }}" />
                </flux:field>
            @endforeach
        @endif
        <flux:button type="submit" variant="primary" color="accent">
            ارسال
        </flux:button>
    </form>
</div>
