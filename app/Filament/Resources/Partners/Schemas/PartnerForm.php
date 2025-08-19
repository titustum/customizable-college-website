<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

use Filament\Schemas\Components\Section;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                 Section::make('Partner Details')
                ->columns(2)
                ->columnSpan('full')
                ->schema([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->required(),
                TextInput::make('website'),

                ])
            ]);
    }
}
