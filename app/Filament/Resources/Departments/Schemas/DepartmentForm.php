<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema; 
use Illuminate\Support\Str;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Department Info')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->live(debounce: 500)
                            ->afterStateUpdated(function ($state, callable $set) {
                                $set('slug', Str::slug($state));
                            }),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        TextInput::make('short_desc')
                            ->label('Short Description')
                            ->required()
                            ->columnSpan(2)
                            ->maxLength(255),
                    ]),

                Section::make('Media')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Department Photo')
                            ->image()
                            ->imageEditor()
                            ->directory('departments/photos')
                            ->required(),

                        FileUpload::make('banner_pic')
                            ->label('Banner Picture')
                            ->image()
                            ->imageEditor()
                            ->directory('departments/banners')
                            ->required(),
                    ]),

                Section::make('Full Description')
                    ->schema([
                        Textarea::make('full_desc')
                            ->label('Detailed Description')
                            ->rows(8)
                            ->required(),
                    ]),
            ]);
    }
}
