<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SuccessStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Success Story Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        Select::make('department_id')
                            ->required()
                            ->options(fn () => \App\Models\Department::pluck('name', 'id')),

                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('photo')
                            ->disk('public')
                            ->image()
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

                    ]),
            ]);
    }
}
