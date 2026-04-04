<?php

namespace App\Filament\Resources\NewsItems\Pages;

use App\Filament\Resources\NewsItems\NewsItemResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewNewsItem extends ViewRecord
{
    protected static string $resource = NewsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
