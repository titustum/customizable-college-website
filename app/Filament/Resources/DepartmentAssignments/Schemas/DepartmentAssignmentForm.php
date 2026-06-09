<?php

namespace App\Filament\Resources\DepartmentAssignments\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DepartmentAssignmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('department_id')
                    ->relationship('department', 'name')
                    ->required(),

                Select::make('team_member_id')
                    ->relationship('teamMember', 'name')
                    ->required(),

                Select::make('role_id')
                    ->relationship('role', 'name'),

                TextInput::make('custom_title'),
            ]);
    }
}
