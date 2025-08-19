<?php

namespace App\Filament\Resources\Uploads\Pages;

use App\Filament\Resources\Uploads\UploadResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUpload extends EditRecord
{
    protected static string $resource = UploadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
