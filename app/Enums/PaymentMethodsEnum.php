<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentMethodsEnum: string implements HasLabel
{
    case BANK_TRANSFER = 'bank_transfer';
    case TAMARA = 'tamara';
    case TABBY = 'tabby';

    public function getLabel(): string
    {
        return match ($this) {
            self::BANK_TRANSFER => __('Bank Transfer'),
            self::TAMARA => __('Tamara'),
            self::TABBY => __('Tabby'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::BANK_TRANSFER => 'primary',
            self::TAMARA => 'danger',
            self::TABBY => 'success',
        };
    }
}