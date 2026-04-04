<?php

namespace App\Filament\Resources\News\Pages;

use App\Filament\Resources\News\NewsItemResource;
use Filament\Resources\Pages\EditRecord;

class EditNewsItem extends EditRecord
{
    protected static string $resource = NewsItemResource::class;
}
