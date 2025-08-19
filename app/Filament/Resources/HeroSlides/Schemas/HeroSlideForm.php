<?php

namespace App\Filament\Resources\HeroSlides\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class HeroSlideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Hero Slide Details')
                ->columns(2)
                ->columnSpan('full')
                ->schema([

                FileUpload::make('image')
                    ->disk('public')
                    ->image()
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

                ])
            ]);
    }
}
