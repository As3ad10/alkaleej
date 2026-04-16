<?php

namespace App\Filament\Resources\CertificateRequests;

use App\Filament\Resources\CertificateRequests\Pages\CreateCertificateRequest;
use App\Filament\Resources\CertificateRequests\Pages\EditCertificateRequest;
use App\Filament\Resources\CertificateRequests\Pages\ListCertificateRequests;
use App\Filament\Resources\CertificateRequests\Schemas\CertificateRequestForm;
use App\Filament\Resources\CertificateRequests\Tables\CertificateRequestsTable;
use App\Models\CertificateRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CertificateRequestResource extends Resource
{
    protected static ?string $model = CertificateRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'fullname';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return __('Certificate Request');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Certificate Requests');
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Basic');
    }

    public static function table(Table $table): Table
    {
        return CertificateRequestsTable::configure($table);
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
            'index' => ListCertificateRequests::route('/'),
        ];
    }
}
