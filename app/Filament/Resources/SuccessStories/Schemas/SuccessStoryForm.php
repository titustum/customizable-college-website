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
                    ->columnSpanFull()
                    ->schema([
                        Select::make('department_id')
                            ->required()
                            ->relationship('department', 'name'),
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('photo')
                            ->image()
                            ->disk('public')
                            ->directory('success-stories')
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
                        TextInput::make('rating')
                            ->required()
                            ->numeric()
                            ->default(5),
                        Select::make('is_approved')
                            ->required()
                            ->options([
                                1 => 'Approved',
                                0 => 'Not Approved',
                            ])
                            ->default(0),
                    ]),
            ]);
    }
}
