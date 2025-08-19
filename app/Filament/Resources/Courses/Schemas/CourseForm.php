<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Course Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        Select::make('department_id')
                            ->required()
                            ->options(fn () => \App\Models\Department::pluck('name', 'id')),
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('photo'),
                        TextInput::make('requirement')
                            ->required(),
                        TextInput::make('duration')
                            ->required(),
                        TextInput::make('exam_body')
                            ->required(),

                    ]),
            ]);
    }
}
