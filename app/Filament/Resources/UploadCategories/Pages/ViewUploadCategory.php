<?php

namespace App\Filament\Resources\UploadCategories\Pages;

use App\Filament\Resources\UploadCategories\UploadCategoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUploadCategory extends ViewRecord
{
    protected static string $resource = UploadCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
