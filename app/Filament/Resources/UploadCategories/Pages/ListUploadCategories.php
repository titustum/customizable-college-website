<?php

namespace App\Filament\Resources\UploadCategories\Pages;

use App\Filament\Resources\UploadCategories\UploadCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUploadCategories extends ListRecords
{
    protected static string $resource = UploadCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
