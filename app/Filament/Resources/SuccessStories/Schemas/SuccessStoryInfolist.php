<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SuccessStoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Success Story Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        // Basic Info
                        TextEntry::make('name'),
                        ImageEntry::make('photo')
                            ->disk('public')
                            ->circular(),
                        TextEntry::make('department_id')
                            ->numeric(),
                        TextEntry::make('course'),
                        TextEntry::make('year'),
                        TextEntry::make('occupation'),
                        TextEntry::make('company'),
                        TextEntry::make('rating')
                            ->numeric(),
                        IconEntry::make('is_approved')
                            ->boolean(),
                        // Statments
                        TextEntry::make('statement')
                            ->columnSpanFull(),
                        // Timestamps
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
            ]);
    }
}
