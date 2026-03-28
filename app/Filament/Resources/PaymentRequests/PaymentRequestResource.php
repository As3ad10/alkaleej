<?php

namespace App\Filament\Resources\PaymentRequests;

use App\Enums\PaymentRequestStatusEnum;
use App\Filament\Resources\PaymentRequests\Pages\CreatePaymentRequest;
use App\Filament\Resources\PaymentRequests\Pages\EditPaymentRequest;
use App\Filament\Resources\PaymentRequests\Pages\ListPaymentRequests;
use App\Filament\Resources\PaymentRequests\Schemas\PaymentRequestForm;
use App\Filament\Resources\PaymentRequests\Tables\PaymentRequestsTable;
use App\Models\PaymentRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PaymentRequestResource extends Resource
{
    protected static ?string $model = PaymentRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'fullname';

    protected static ?int $navigationSort = 1;

    public static function getModelLabel(): string
    {
        return __('Payment Request');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Payment Requests');
    }

    public static function getNavigationBadge(): ?string
    {
        return PaymentRequest::where('status', PaymentRequestStatusEnum::NEW)->count();
    }

    public static function getNavigationBadgeColor(): string
    {
        return PaymentRequest::where('status', PaymentRequestStatusEnum::NEW)->count() > 0 ? 'warning' : 'gray';
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Basic');
    }

    public static function table(Table $table): Table
    {
        return PaymentRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPaymentRequests::route('/'),
        ];
    }
}