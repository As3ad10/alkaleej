<?php

namespace App\Filament\Resources\CertificateRequests\Tables;

use Alkoumi\LaravelHijriDate\Hijri;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\ExportAction;

class CertificateRequestsTable
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
                TextColumn::make('created_at')
                    ->label(__("Created at"))
                    ->state(fn($record) => Hijri::Date('j F Y', $record->created_at))
                    ->sortable(),
            ])
            ->filters([
                //
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