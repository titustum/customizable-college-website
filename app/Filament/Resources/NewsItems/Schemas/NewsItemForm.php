<?php

namespace App\Filament\Resources\NewsItems\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class NewsItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('News Item Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedNewspaper)
                    ->schema([
                        Select::make('news_category_id')
                            ->required()
                            ->relationship('newsCategory', 'name'),
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        Textarea::make('excerpt')
                            ->columnSpanFull(),
                        Textarea::make('content')
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image(),
                        Toggle::make('is_published')
                            ->required(),
                        DateTimePicker::make('published_at'),
                    ]),
            ]);
    }
}
