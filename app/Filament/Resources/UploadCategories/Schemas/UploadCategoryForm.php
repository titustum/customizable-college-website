<?php

namespace App\Filament\Resources\UploadCategories\Schemas;

use Filament\Forms\Components\TextInput; 
use Filament\Schemas\Schema;

class UploadCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('slug')->required(),
            ]);
    }
}
