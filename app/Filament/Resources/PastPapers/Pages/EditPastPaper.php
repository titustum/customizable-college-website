<?php

namespace App\Filament\Resources\PastPapers\Pages;

use App\Filament\Resources\PastPapers\PastPaperResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPastPaper extends EditRecord
{
    protected static string $resource = PastPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
