<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                 Section::make('Role Details') 
                ->schema([
                TextInput::make('name')
                    ->required(),
                ])
            ]);
    }
}
