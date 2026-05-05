<?php

namespace App\Filament\Resources\Applications\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\Applications\ApplicationResource;
use Filament\Actions\DeleteAction;

class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            // EditAction::make(),
        ];
    }
}
