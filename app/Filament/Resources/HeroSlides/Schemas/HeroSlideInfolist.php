<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Hero Slide Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        ImageEntry::make('image')
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
