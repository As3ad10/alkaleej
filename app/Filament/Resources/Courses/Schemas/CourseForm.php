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
                    ->label(__('Course Name'))
                    ->required(),
                TextInput::make('price')
                    ->label(__('Course Price'))
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('SAR'),
                FileUpload::make('image')
                    ->label(__('Image'))
                    ->image()
                    ->directory('courses')
                    ->disk('public'),
                Textarea::make('periods')
                    ->label(__('Course Duration'))
                    ->default(null)
                    ->rows(3)
                    ->helperText(__('Enter every option in a new line'))
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
                    ->label(__('Course Description'))
                    ->default(null)
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->label(__('Status'))
                    ->required(),
            ]);
    }
}
