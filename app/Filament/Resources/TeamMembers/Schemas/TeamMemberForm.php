<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('department_id')
                    ->required()
                    ->numeric(),
                TextInput::make('role_id')
                    ->required()
                    ->numeric(),
                TextInput::make('section_assigned'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('photo'),
                TextInput::make('qualification')
                    ->required(),
                TextInput::make('graduation_year')
                    ->required()
                    ->default('2022'),
            ]);
    }
}
