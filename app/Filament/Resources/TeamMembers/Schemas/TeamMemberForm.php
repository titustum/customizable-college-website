<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution_id')
                    ->required()
                    ->numeric(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('name')
                    ->required(),
                FileUpload::make('photo')
                    ->disk('public')
                    ->directory('team_members')
                    ->image()
                    ->avatar(),

                // ✅ ROLES (IMPORTANT ADDITION)
                Select::make('roles')
                    ->label('Roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),

                // CheckboxList::make('roles')
                //     ->relationship('roles', 'name')
                //     ->columns(3)
                //     ->columnSpanFull(),

                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
