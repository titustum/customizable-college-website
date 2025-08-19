<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                TextInput::make('photo')
                    ->required(),
                TextInput::make('short_desc')
                    ->required(),
                Textarea::make('full_desc')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('banner_pic')
                    ->required(),
            ]);
    }
}
