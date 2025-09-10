<?php

namespace App\Filament\Resources\HeroSlideContents\Pages;

use App\Filament\Resources\HeroSlideContents\HeroSlideContentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHeroSlideContents extends ListRecords
{
    protected static string $resource = HeroSlideContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
