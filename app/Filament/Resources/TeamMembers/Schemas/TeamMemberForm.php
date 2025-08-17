<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload; 
use Filament\Schemas\Schema;

use Filament\Schemas\Components\Section;

use App\Models\Department;
use App\Models\Role;

class TeamMemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Team Member Details')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('Full Name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->email()
                        ->unique(ignoreRecord: true)
                        ->nullable()
                        ->maxLength(255),

                    Select::make('department_id')
                        ->label('Department')
                        ->relationship('department', 'name')
                        ->searchable()
                        ->required(),

                    Select::make('role_id')
                        ->label('Role')
                        ->relationship('role', 'name')
                        ->searchable()
                        ->required(),

                    TextInput::make('section_assigned')
                        ->label('Section Assigned')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('qualification')
                        ->label('Qualification')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('graduation_year')
                        ->label('Graduation Year')
                        ->default('2022')
                        ->maxLength(4)
                        ->numeric(),

                    FileUpload::make('photo')
                        ->label('Profile Photo')
                        ->image()
                        ->directory('team-members/photos')
                        ->nullable(),
                ])->columnSpanFull(),
        ]);
    }
}
