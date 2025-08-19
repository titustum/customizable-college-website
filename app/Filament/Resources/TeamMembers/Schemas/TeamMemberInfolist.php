<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Team Member Details')
                ->columns(2)          // inside section, 2 columns layout
                ->columnSpan('full')  // section spans full width (w-full)
                ->schema([
                    ImageEntry::make('photo')->disk('public'),

                    TextEntry::make('name'),

                    TextEntry::make('department.name')->label('Department'),

                    TextEntry::make('role.name')->label('Role'),

                    TextEntry::make('section_assigned')->label('Section Assigned'),

                    TextEntry::make('email')->label('Email Address'),

                    TextEntry::make('qualification'),

                    TextEntry::make('graduation_year')->label('Graduation Year'),

                    TextEntry::make('created_at')->label('Created At')->dateTime(),

                    TextEntry::make('updated_at')->label('Updated At')->dateTime(),
                ]),
        ]);
    }
}
