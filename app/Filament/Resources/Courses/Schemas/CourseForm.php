<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Models\Department;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Course Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedBookOpen)
                    ->schema([
                        Select::make('department_id')
                            ->required()
                            ->options(fn () => Department::pluck('name', 'id')),
                        TextInput::make('name')
                            ->required(),
                        FileUpload::make('photo')
                            ->disk('public')
                            ->image(),
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
