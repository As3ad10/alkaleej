<?php

namespace App\Filament\Resources\PaymentRequestStatuses\Pages;

use App\Filament\Resources\PaymentRequestStatuses\PaymentRequestStatusResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManagePaymentRequestStatuses extends ManageRecords
{
    protected static string $resource = PaymentRequestStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
