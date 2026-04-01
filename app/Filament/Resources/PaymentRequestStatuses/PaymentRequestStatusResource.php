<?php

namespace App\Filament\Resources\PaymentRequestStatuses;

use App\Filament\Resources\PaymentRequestStatuses\Pages\ManagePaymentRequestStatuses;
use App\Models\PaymentRequestStatus;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class PaymentRequestStatusResource extends Resource
{
    protected static ?string $model = PaymentRequestStatus::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return __('Payment Request Status');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Payment Request Statuses');
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Settings');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('Payment Request Status Name'))
                    ->required(),
                ColorPicker::make('color')
                    ->label(__('Payment Request Status Color')),
                Toggle::make('status')
                    ->label(__('Payment Request Status Status'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label(__('Payment Request Status Name'))
                    ->searchable(),
                ColorColumn::make('color')
                    ->label(__('Payment Request Status Color')),
                IconColumn::make('status')
                    ->boolean()
                    ->label(__('Payment Request Status Status')),
                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePaymentRequestStatuses::route('/'),
        ];
    }
}