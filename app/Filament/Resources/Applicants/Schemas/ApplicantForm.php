<?php

namespace App\Filament\Resources\Applicants\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ApplicantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('alternative_phone')
                    ->tel(),
                Select::make('gender') 
                    ->required()
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                        'other' => 'Other',
                    ]),
                TextInput::make('id_number')
                    ->required(),
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                TextInput::make('start_term')
                    ->required(),
                TextInput::make('high_school')
                    ->required(),
                TextInput::make('high_school_grade')
                    ->required(),
                TextInput::make('kcse_index_number')
                    ->required(),
                TextInput::make('kcse_year')
                    ->required()
                    ->numeric(),
                TextInput::make('nemis_upi_number'),
                TextInput::make('parent_name')
                    ->required(),
                TextInput::make('parent_phone')
                    ->tel()
                    ->required(),
            ]);
    }
}
