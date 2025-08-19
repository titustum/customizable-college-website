<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('department_id')
                    ->numeric(),
                TextEntry::make('role_id')
                    ->numeric(),
                TextEntry::make('section_assigned'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('name'),
                TextEntry::make('photo'),
                TextEntry::make('qualification'),
                TextEntry::make('graduation_year'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
