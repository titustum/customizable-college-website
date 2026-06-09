<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class SuccessStoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Success Story Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedStar)
                    ->schema([
                        TextEntry::make('name'),
                        ImageEntry::make('photo')
                            ->disk('public')
                            ->circular(),
                        TextEntry::make('department.name'),
                        TextEntry::make('course'),
                        TextEntry::make('year'),
                        TextEntry::make('occupation'),
                        TextEntry::make('company'),
                        TextEntry::make('rating')
                            ->numeric(),
                        IconEntry::make('is_approved')
                            ->boolean(),
                        TextEntry::make('statement')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
