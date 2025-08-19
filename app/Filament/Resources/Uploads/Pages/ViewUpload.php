<?php

namespace App\Filament\Resources\Uploads\Pages;

use App\Filament\Resources\Uploads\UploadResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUpload extends ViewRecord
{
    protected static string $resource = UploadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
