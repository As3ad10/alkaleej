<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum InstitutionAttributeTypeEnum: string implements HasLabel
{
    case TEXT = 'text';
    case DATE = 'date';
    case TEXTAREA = 'textarea';
    case SELECT = 'select';

    public function input()
    {
        return match ($this) {
            self::TEXT => \Filament\Forms\Components\TextInput::make('text'),
            self::DATE => \Filament\Forms\Components\DatePicker::make('date'),
            self::TEXTAREA => \Filament\Forms\Components\Textarea::make('textarea'),
            self::SELECT => \Filament\Forms\Components\Select::make('select'),
        };
    }

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