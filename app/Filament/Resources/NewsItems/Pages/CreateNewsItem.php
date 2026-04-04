<?php

namespace App\Filament\Resources\NewsItems\Pages;

use App\Filament\Resources\NewsItems\NewsItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsItem extends CreateRecord
{
    protected static string $resource = NewsItemResource::class;
}
