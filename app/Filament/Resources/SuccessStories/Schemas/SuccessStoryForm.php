<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class SuccessStoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Success Story Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedStar)
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
                        Toggle::make('is_approved')
                            ->required(),
                    ]),
            ]);
    }
}
