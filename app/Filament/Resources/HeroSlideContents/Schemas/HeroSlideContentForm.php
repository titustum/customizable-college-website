<?php

namespace App\Filament\Resources\HeroSlideContents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSlideContentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Hero Slide Content')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('hero_slide_images')
                            ->required(),
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('subtitle')
                            ->required(),
                        TextInput::make('slogan'),
                        TextInput::make('button_text')
                            ->required()
                            ->default('Join Us Now'),
                        TextInput::make('button_link')
                            ->required()
                            ->default('#'),
                    ]),
            ]);
    }
}
