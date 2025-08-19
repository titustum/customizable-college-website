<?php

namespace App\Filament\Resources\Departments\Schemas;

use Faker\Core\File;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('photo')
                    ->disk('public')
                    ->required(),
                TextInput::make('short_desc')
                    ->required(),
                Textarea::make('full_desc')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('banner_pic')
                    ->disk('public')
                    ->required(),
            ]);
    }
}
