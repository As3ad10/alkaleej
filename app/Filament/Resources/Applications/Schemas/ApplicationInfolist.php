<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Schemas\Schema;
use Filament\Infolists\Components\TextEntry;

class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('fullname')
                    ->label(__("Fullname"))
                    ->formatStateUsing(fn($record) => $record->title . '/ ' . $record->fullname),
                TextEntry::make('course.name')
                    ->label(__("Course Name")),
                TextEntry::make('institution.name')
                    ->label(__("Institution Name")),
                TextEntry::make('period')
                    ->label(__("Course period"))
                    ->placeholder('-'),
                TextEntry::make('id_number')
                    ->label(__("ID number")),
                TextEntry::make('phone_number')
                    ->label(__("Phone number")),
                TextEntry::make('institution_attributes')
                    ->label(__("Additional info"))
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('pdf')
                    ->label(__("PDF"))
                    ->url(fn($record) => $record->pdf, true),
                TextEntry::make('created_at')
                    ->label(__("Created at"))
                    ->dateTime('d/m/Y h:m a')
                    ->placeholder('-'),
            ]);
    }
}
