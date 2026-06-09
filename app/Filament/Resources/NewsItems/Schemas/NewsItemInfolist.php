<?php

namespace App\Filament\Resources\NewsItems\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class NewsItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('News Item Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedNewspaper)
                    ->schema([
                        TextEntry::make('newsCategory.name'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('excerpt')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        ImageEntry::make('image')
                            ->placeholder('-'),
                        IconEntry::make('is_published')
                            ->boolean(),
                        TextEntry::make('published_at')
                            ->dateTime()
                            ->placeholder('-'),
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
