<?php

namespace App\Filament\Widgets;

use App\Enums\PaymentRequestStatusEnum;
use App\Models\PaymentRequest;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PaymentRequestsStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Payment Requests', PaymentRequest::where('status', PaymentRequestStatusEnum::NEW)->count())
                ->label(__("New Payment Requests"))
                ->description(__("New Payment Requests"))
                ->descriptionIcon('heroicon-o-arrow-path-rounded-square')
                ->color(PaymentRequestStatusEnum::NEW->getColor()),
            Stat::make('Pending Payment Requests', PaymentRequest::where('status', PaymentRequestStatusEnum::PENDING)->count())
                ->label(__("Pending Payment Requests"))
                ->description(__("Pending Payment Requests"))
                ->descriptionIcon('heroicon-o-clock')
                ->color(PaymentRequestStatusEnum::PENDING->getColor()),
            Stat::make('Completed Payment Requests', PaymentRequest::where('status', PaymentRequestStatusEnum::COMPLETED)->count())
                ->label(__("Completed Payment Requests"))
                ->description(__("Completed Payment Requests"))
                ->descriptionIcon('heroicon-o-check-circle')
                ->color(PaymentRequestStatusEnum::COMPLETED->getColor()),
        ];
    }
}