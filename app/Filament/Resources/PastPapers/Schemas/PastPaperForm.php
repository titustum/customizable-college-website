<?php

namespace App\Filament\Resources\PastPapers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PastPaperForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Past Paper Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        Select::make('course_id')
                            ->required()
                            ->relationship('course', 'name'),
                        TextInput::make('unit_name')
                            ->required(),
                        Select::make('exam_type')
                            ->required()
                            ->options([
                                'final' => 'Final Exam',
                                'midterm' => 'Midterm Exam',
                            ]),
                        TextInput::make('exam_year')
                            ->required()
                            ->numeric(),
                        TextInput::make('term'),
                        FileUpload::make('file_path')
                            ->disk('public')
                            ->required(),
                    ]),
            ]);
    }
}
