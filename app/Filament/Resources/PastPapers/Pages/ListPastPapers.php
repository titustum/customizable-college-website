<?php

namespace App\Filament\Resources\PastPapers\Pages;

use App\Filament\Resources\PastPapers\PastPaperResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPastPapers extends ListRecords
{
    protected static string $resource = PastPaperResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
