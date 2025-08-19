<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Contact Information')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required(),
                        TextInput::make('subject')
                            ->required(),
                        Textarea::make('message')
                            ->required()
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
