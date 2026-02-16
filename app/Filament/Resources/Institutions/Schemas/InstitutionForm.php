<?php

namespace App\Filament\Resources\Institutions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;

class InstitutionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Toggle::make('status')
                    ->label(__('Status'))
                    ->inline(false)
                    ->default(true),
                Repeater::make('attributes')
                    ->label(__('Attributes'))
                    ->columnSpanFull()
                    ->columns(2)
                    ->relationship('attributes')
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Field Name'))
                            ->required()
                            ->placeholder(__('Enter field name')),
                        Select::make('type')
                            ->label(__('Field Type'))
                            ->required()
                            ->reactive()
                            ->live()
                            ->options(\App\Enums\InstitutionAttributeTypeEnum::class),
                        Toggle::make('is_required')
                            ->label(__('Is Field Required?'))
                            ->inline(false)
                            ->default(false),
                        Toggle::make('status')
                            ->label(__('Status'))
                            ->inline(false)
                            ->default(true),
                        Textarea::make('options')
                            ->label(__('Options'))
                            ->required(fn(Get $get) => $get('type') === \App\Enums\InstitutionAttributeTypeEnum::SELECT)
                            ->helperText(__('Enter every option in a new line'))
                            ->visible(fn(Get $get) => $get('type') === \App\Enums\InstitutionAttributeTypeEnum::SELECT)
                            ->dehydrateStateUsing(function ($state) {
                                if (blank($state)) {
                                    return [];
                                }
                                return collect(preg_split('/\r\n|\r|\n/', $state))
                                    ->map(fn($line) => trim($line))
                                    ->filter()
                                    ->values()
                                    ->toArray();
                            })
                            ->formatStateUsing(fn($state) => is_array($state) ? implode("\n", $state) : $state),
                    ]),
            ]);
    }
}
