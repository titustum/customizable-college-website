<?php

namespace App\Filament\Resources\HeroSlideContents\Pages;

use App\Filament\Resources\HeroSlideContents\HeroSlideContentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHeroSlideContent extends EditRecord
{
    protected static string $resource = HeroSlideContentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
