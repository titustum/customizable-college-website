<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class HeroSlideInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Slide Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedPhoto)
                    ->schema([
                        ImageEntry::make('image')
                            ->disk('public'),
                        TextEntry::make('title')
                            ->placeholder('-'),
                        TextEntry::make('subtitle')
                            ->placeholder('-'),
                        TextEntry::make('slogan')
                            ->placeholder('-'),
                        TextEntry::make('button_text')
                            ->placeholder('-'),
                        TextEntry::make('button_link')
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
