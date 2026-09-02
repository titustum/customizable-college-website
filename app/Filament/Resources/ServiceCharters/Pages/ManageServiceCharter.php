<?php

namespace App\Filament\Resources\ServiceCharters\Pages;

use App\Filament\Resources\ServiceCharters\ServiceCharterResource;
use App\Models\ServiceCharter;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class ManageServiceCharter extends EditRecord
{
    protected static string $resource = ServiceCharterResource::class;

    protected static ?string $title = 'Service Charter';

    public function mount(int|string|null $record = null): void
    {
        $this->record = ServiceCharter::query()->first() ?? new ServiceCharter();

        $this->fillForm();
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        if ($record->exists) {
            $record->update($data);

            return $record;
        }

        $this->record = ServiceCharter::create($data);

        return $this->record;
    }
}