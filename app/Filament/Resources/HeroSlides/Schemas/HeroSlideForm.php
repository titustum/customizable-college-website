<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Hero Slide Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('hero-slides'),
                        TextInput::make('title'),
                        TextInput::make('subtitle'),
                        TextInput::make('slogan'),
                        TextInput::make('button_text'),
                        TextInput::make('button_link'),
                    ]),
            ]);
    }
}
