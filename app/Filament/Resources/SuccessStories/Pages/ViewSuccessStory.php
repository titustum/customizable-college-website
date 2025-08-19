<?php

namespace App\Filament\Resources\SuccessStories\Pages;

use App\Filament\Resources\SuccessStories\SuccessStoryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSuccessStory extends ViewRecord
{
    protected static string $resource = SuccessStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
