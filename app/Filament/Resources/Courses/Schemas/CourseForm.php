<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('department_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('photo'),
                TextInput::make('requirement')
                    ->required(),
                TextInput::make('duration')
                    ->required(),
                TextInput::make('exam_body')
                    ->required(),
            ]);
    }
}
