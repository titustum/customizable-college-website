<?php

namespace App\Filament\Resources\InstitutionSettings\Pages;

use App\Filament\Resources\InstitutionSettings\InstitutionSettingResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewInstitutionSetting extends ViewRecord
{
    protected static string $resource = InstitutionSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
