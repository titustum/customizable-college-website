<?php

namespace App\Filament\Resources\News\Pages;

use App\Filament\Resources\News\NewsItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsItem extends CreateRecord
{
    protected static string $resource = NewsItemResource::class;
}
