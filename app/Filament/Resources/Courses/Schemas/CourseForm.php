<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('department_id')
                ->label('Department')
                ->relationship('department', 'name')
                ->searchable()
                ->preload()
                ->required(),

            TextInput::make('name')
                ->label('Course Name')
                ->required()
                ->maxLength(255),

            FileUpload::make('photo')
                ->label('Course Photo')
                ->image()
                ->directory('courses')
                ->imagePreviewHeight('150')
                ->maxSize(2048),

            TextInput::make('requirement')
                ->label('Entry Requirement')
                ->required()
                ->maxLength(255),

            TextInput::make('duration')
                ->label('Duration')
                ->required()
                ->maxLength(255),

            TextInput::make('exam_body')
                ->label('Exam Body')
                ->required()
                ->maxLength(255),
        ]);
    }
}
