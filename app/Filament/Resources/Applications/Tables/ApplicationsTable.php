<?php

namespace App\Filament\Resources\Applications\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fullname')
                    ->label(__("Fullname"))
                    ->searchable(),
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
                    ->dateTime('d/m/Y h:m a')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
