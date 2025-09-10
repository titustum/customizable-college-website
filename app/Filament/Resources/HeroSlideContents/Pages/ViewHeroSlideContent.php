<?php

namespace App\Filament\Resources\HeroSlideContents\Pages;

use App\Filament\Resources\HeroSlideContents\HeroSlideContentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHeroSlideContent extends ViewRecord
{
    protected static string $resource = HeroSlideContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
