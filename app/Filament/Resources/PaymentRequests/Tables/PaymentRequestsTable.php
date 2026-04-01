<?php

namespace App\Filament\Resources\PaymentRequests\Tables;

use Alkoumi\LaravelHijriDate\Hijri;
use App\Enums\PaymentMethodsEnum;
use App\Enums\PaymentRequestStatusEnum;
use App\Models\PaymentMethod;
use App\Models\PaymentRequest;
use App\Models\PaymentRequestStatus;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use pxlrbt\FilamentExcel\Actions\ExportAction;

class PaymentRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullname')
                    ->label(__("Fullname"))
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__("Job title")),
                TextColumn::make('course.name')
                    ->label(__("Course Name")),
                TextColumn::make('institution.name')
                    ->label(__("Institution Name")),
                TextColumn::make('period')
                    ->label(__("Course period"))
                    ->searchable(),
                TextColumn::make('id_number')
                    ->label(__("ID number"))
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->label(__("Phone number"))
                    ->searchable(),
                TextColumn::make('paymentMethod.name')
                    ->label(__("Payment Method"))
                    ->badge()
                    ->color(fn($record) => Color::hex($record->paymentMethod->color))
                    ->searchable(),
                TextColumn::make('paymentRequestStatus.name')
                    ->label(__("Payment Status"))
                    ->badge()
                    ->color(fn($record) => Color::hex($record->paymentRequestStatus->color))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__("Created at"))
                    ->state(fn($record) => Hijri::Date('j F Y', $record->created_at))
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('payment_request_status_id')
                    ->options(PaymentRequestStatus::all()->pluck('name', 'id'))
                    ->label(__("Payment Status")),
                SelectFilter::make('payment_method_id')
                    ->options(PaymentMethod::all()->pluck('name', 'id'))
                    ->label(__("Payment Method")),
            ], layout: FiltersLayout::AboveContent)
            ->recordActions([
                Action::make('change_status')
                    ->label(__("Change Payment Status"))
                    ->modalWidth('md')
                    ->visible(fn($record) => Auth::user()->can('update', $record))
                    ->authorize('update')
                    ->schema([
                        Select::make('payment_request_status_id')
                            ->options(PaymentRequestStatus::active()->get()->pluck('name', 'id'))
                            ->label(__("Payment Status")),
                    ])
                    ->action(function ($record, array $data) {
                        $record->payment_request_status_id = $data['payment_request_status_id'];
                        $record->save();
                    }),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exports([
                        \pxlrbt\FilamentExcel\Exports\ExcelExport::make('table')->fromTable(),
                    ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}