<?php

namespace App\Filament\Resources\InstitutionSettings\Pages;

use App\Filament\Resources\InstitutionSettings\InstitutionSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstitutionSettings extends ListRecords
{
    protected static string $resource = InstitutionSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
