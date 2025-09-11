<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Personal Information')
                ->columns(2)
                ->columnSpan('full')
                ->schema([
                    TextInput::make('name')
                        ->label('Full Name')
                        ->required(),

                    TextInput::make('email')
                        ->label('Email Address')
                        ->email()
                        ->nullable(),

                    FileUpload::make('photo')
                        ->label('Profile Photo')
                        ->disk('public')
                        ->directory('team_members')
                        ->image()
                        ->imageEditor()
                        ->required(),

                    Select::make('department_id')
                        ->label('Department')
                        ->options(fn () => \App\Models\Department::pluck('name', 'id'))
                        ->searchable()
                        ->required(),

                    Select::make('role_id')
                        ->label('Role')
                        ->options(fn () => \App\Models\Role::pluck('name', 'id'))
                        ->searchable()
                        ->required(),

                    TextInput::make('section_assigned')
                        ->label('Section Assigned')
                        ->nullable(),

                    TextInput::make('qualification')
                        ->label('Qualification')
                        ->required(),

                    TextInput::make('graduation_year')
                        ->label('Graduation Year')
                        ->numeric()
                        ->default(now()->year)
                        ->required(),
                ]),
        ]);
    }
}
