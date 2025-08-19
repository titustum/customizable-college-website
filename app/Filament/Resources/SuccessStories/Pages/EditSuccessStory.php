<?php

namespace App\Filament\Resources\SuccessStories\Pages;

use App\Filament\Resources\SuccessStories\SuccessStoryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSuccessStory extends EditRecord
{
    protected static string $resource = SuccessStoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
