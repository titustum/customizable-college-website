<?php

namespace App\Filament\Resources\HeroSlideContents\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideContentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Slide Content')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Image')
                            ->disk('public'),
                        TextEntry::make('title'),
                        TextEntry::make('subtitle'),
                        TextEntry::make('slogan'),
                        TextEntry::make('button_text'),
                        TextEntry::make('button_link'),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
            ]);
    }
}
