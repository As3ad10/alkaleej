<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PaymentRequestStatusEnum: string implements HasLabel
{
    case NEW = 'new';
    case PENDING = 'pending';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::NEW => __('New Payment Request'),
            self::PENDING => __('Pending Payment Request'),
            self::COMPLETED => __('Completed Payment Request'),
            self::CANCELLED => __('Cancelled Payment Request'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::NEW => 'gray',
            self::PENDING => 'info',
            self::COMPLETED => 'success',
            self::CANCELLED => 'danger',
        };
    }
}