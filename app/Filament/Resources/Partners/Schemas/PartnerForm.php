<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

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
                            ->directory('partners')
                            ->required(),
                        TextInput::make('website'),

                    ]),
            ]);
    }
}
