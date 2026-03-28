<?php

namespace App\Filament\Resources\CertificateRequests\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CertificateRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                TextInput::make('institution_id')
                    ->required()
                    ->numeric(),
                TextInput::make('period')
                    ->default(null),
                TextInput::make('title')
                    ->required(),
                TextInput::make('fullname')
                    ->required(),
                TextInput::make('id_number')
                    ->required(),
                TextInput::make('phone_number')
                    ->tel()
                    ->required(),
            ]);
    }
}
