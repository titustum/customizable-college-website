<?php

namespace App\Filament\Resources\InstitutionSettings\Pages;

use App\Filament\Resources\InstitutionSettings\InstitutionSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditInstitutionSetting extends EditRecord
{
    protected static string $resource = InstitutionSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
