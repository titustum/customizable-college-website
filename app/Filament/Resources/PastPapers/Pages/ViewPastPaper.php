<?php

namespace App\Filament\Resources\PastPapers\Pages;

use App\Filament\Resources\PastPapers\PastPaperResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPastPaper extends ViewRecord
{
    protected static string $resource = PastPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
