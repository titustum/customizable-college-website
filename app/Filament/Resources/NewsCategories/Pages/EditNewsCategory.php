<?php

namespace App\Filament\Resources\NewsCategories\Pages;

use App\Filament\Resources\NewsCategories\NewsCategoryResource;
use Filament\Resources\Pages\EditRecord;

class EditNewsCategory extends EditRecord
{
    protected static string $resource = NewsCategoryResource::class;
}
