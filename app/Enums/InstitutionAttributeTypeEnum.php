<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum InstitutionAttributeTypeEnum: string implements HasLabel
{
    case TEXT = 'text';
    case DATE = 'date';
    case TEXTAREA = 'textarea';
    case SELECT = 'select';

    public function getLabel(): string
    {
        return match ($this) {
            self::TEXT => __('Text Input'),
            self::DATE => __('Date Input'),
            self::TEXTAREA => __('Textarea Input'),
            self::SELECT => __('Select Input'),
        };
    }
}