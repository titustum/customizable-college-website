<?php

namespace App\Filament\Resources\PastPapers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PastPaperForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                TextInput::make('unit_name')
                    ->required(),
                TextInput::make('exam_type')
                    ->required()
                    ->default('final'),
                TextInput::make('exam_year')
                    ->required()
                    ->numeric(),
                TextInput::make('term'),
                TextInput::make('file_path')
                    ->required(),
            ]);
    }
}
