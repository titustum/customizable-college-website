<?php

namespace App\Filament\Resources\SuccessStories\Pages;

use App\Filament\Resources\SuccessStories\SuccessStoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSuccessStories extends ListRecords
{
    protected static string $resource = SuccessStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
