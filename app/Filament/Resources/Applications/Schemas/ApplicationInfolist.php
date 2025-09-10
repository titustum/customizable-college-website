<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Applicant Information')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('full_name'),
                        TextEntry::make('phone'),
                        TextEntry::make('alternative_phone'),
                        TextEntry::make('id_number'),
                        TextEntry::make('course.name')
                            ->numeric(),
                        TextEntry::make('start_term'),
                        TextEntry::make('high_school'),
                        TextEntry::make('high_school_grade'),
                        TextEntry::make('kcse_index_number'),
                        TextEntry::make('kcse_year'),
                        TextEntry::make('nemis_upi_number'),
                        TextEntry::make('parent_name'),
                        TextEntry::make('parent_phone'),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
            ]);
    }
}
