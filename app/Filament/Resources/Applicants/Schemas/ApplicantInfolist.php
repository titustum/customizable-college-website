<?php

namespace App\Filament\Resources\Applicants\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant Information')
                    ->description('Detailed information about the applicant.')
                    ->columnSpanFull()
                    ->schema([
                Section::make('Personal Details') 
                        ->schema([
                            TextEntry::make('full_name')->label('Full Name'),
                            TextEntry::make('phone'),
                            TextEntry::make('gender'),
                            TextEntry::make('id_number')->label('ID Number'),
                        ])->columns(2),

                    Section::make('Education')
                        ->schema([
                            TextEntry::make('high_school')->label('High School'),
                            TextEntry::make('high_school_grade')->label('Grade'),
                            TextEntry::make('kcse_index_number')->label('KCSE Index No'),
                            TextEntry::make('kcse_year')->label('KCSE Year'),
                        ])->columns(2),

                    Section::make('Course Info')
                        ->schema([
                            TextEntry::make('course.name')->label('Course'),
                            TextEntry::make('start_term')->label('Start Term'),
                        ]),

                    Section::make('Parent/Guardian Contact')
                        ->schema([
                            TextEntry::make('parent_name')->label('Parent Name'),
                            TextEntry::make('parent_phone')->label('Parent Phone'),
                        ])->columns(2),

                        ]),
            ]);
    }
}
