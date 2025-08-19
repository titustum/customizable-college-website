<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('logo')
                    ->required(),
                TextInput::make('website'),
            ]);
    }
}
