<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Panakour\FilamentFlatPage\Pages\FlatPage;
use UnitEnum;

class GeneralSettings extends FlatPage
{
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Settings');
    }

    public function getTitle(): string
    {
        return __('General Settings');
    }

    public function getFileName(): string
    {
        return 'settings.json';
    }

    protected function getFlatFilePageForm(): array
    {
        return [
            Section::make(__('General Settings'))
                ->icon('heroicon-o-computer-desktop')
                ->schema([
                    Toggle::make('toggle_bot')
                        ->required()
                        ->hintIcon('heroicon-o-language')
                        ->label(__("Bot Toggle")),
                ]),
        ];
    }
}
