<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use App\Models\Department;
use App\Models\Role;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Team member details')
                    ->columnSpanFull()
                    ->columns(2)
                    ->icon(Heroicon::OutlinedUser)
                    ->schema([
                Select::make('department_id')
                    ->label('Department')
                    ->options(fn () => Department::pluck('name', 'id')),
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
                Select::make('role_id')
                    ->label('Role')
                    ->options(Role::pluck('name', 'id'))
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
                    ])
            ]);
    }
}
