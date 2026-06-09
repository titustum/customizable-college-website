<?php

namespace App\Filament\Resources\Tenders\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TenderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('reference_number')
                    ->required(),
                DatePicker::make('opening_date'),
                DatePicker::make('closing_date')
                    ->required(),
                TextInput::make('attachment_path'),
                TextInput::make('status')
                    ->required()
                    ->default('open'),
            ]);
    }
}
