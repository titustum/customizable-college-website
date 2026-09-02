<?php

namespace App\Filament\Resources\InstitutionSettings\Pages;

use App\Filament\Resources\InstitutionSettings\InstitutionSettingResource;
use App\Models\InstitutionSetting;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class ManageInstitutionSetting extends EditRecord
{
    protected static string $resource = InstitutionSettingResource::class;

    protected static ?string $title = 'Institution Settings';

    public function mount(int|string|null $record = null): void
    {
        $this->record = InstitutionSetting::query()->first() ?? new InstitutionSetting;

        $this->fillForm();
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if ($record->exists) {
            $record->update($data);

            return $record;
        }

        $this->record = InstitutionSetting::create(array_merge([
            'id' => 1,
            'slug' => 'tetu',
            'category' => 'tvc',
        ], $data));

        return $this->record;
    }
}
