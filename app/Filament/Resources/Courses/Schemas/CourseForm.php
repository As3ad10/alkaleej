<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('SAR'),
                FileUpload::make('image')
                    ->image()
                    ->directory('courses')
                    ->disk('public'),
                Textarea::make('periods')
                    ->default(null)
                    ->rows(3)
                    ->helperText('ضع كل خيار في كل سطر منفصل')
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
                    ->formatStateUsing(function ($state) {
                        // Convert array back to textarea string when editing
                        if (is_array($state)) {
                            return implode(PHP_EOL, $state);
                        }

                        return $state;
                    }),
                RichEditor::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
