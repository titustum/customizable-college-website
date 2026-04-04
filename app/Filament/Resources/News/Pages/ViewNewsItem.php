<?php

namespace App\Filament\Resources\News\Pages;

use App\Filament\Resources\News\NewsItemResource;
use Filament\Resources\Pages\ViewRecord;

class ViewNewsItem extends ViewRecord
{
    protected static string $resource = NewsItemResource::class;
}
