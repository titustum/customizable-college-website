<?php

namespace App\Filament\Resources\UploadCategories\Pages;

use App\Filament\Resources\UploadCategories\UploadCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditUploadCategory extends EditRecord
{
    protected static string $resource = UploadCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
