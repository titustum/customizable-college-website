<?php

namespace App\Filament\Resources\NewsItems\Pages;

use App\Filament\Resources\NewsItems\NewsItemResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditNewsItem extends EditRecord
{
    protected static string $resource = NewsItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
