<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Role Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedShieldCheck)
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('level')
                            ->required()
                            ->numeric()
                            ->default(100),
                        TextInput::make('display_order')
                            ->required()
                            ->numeric()
                            ->default(100),
                    ]),
            ]);
    }
}
