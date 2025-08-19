<?php

namespace App\Filament\Resources\Uploads\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UploadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Upload Document Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        Select::make('upload_category')
                            ->required()
                            ->options(fn () => \App\Models\UploadCategory::pluck('name', 'id')), 
                        FileUpload::make('file_path')
                            ->disk('public')
                            ->required(),
                    ]),
            ]);
    }
}
