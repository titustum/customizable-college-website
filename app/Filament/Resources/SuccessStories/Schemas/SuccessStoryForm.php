<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SuccessStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('department_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('photo')
                    ->required(),
                TextInput::make('course')
                    ->required(),
                TextInput::make('year')
                    ->required(),
                TextInput::make('occupation')
                    ->required(),
                TextInput::make('company')
                    ->required(),
                Textarea::make('statement')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
