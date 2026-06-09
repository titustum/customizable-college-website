<?php

namespace App\Filament\Resources\Vacancies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class VacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Vacancy Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedBriefcase)
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('reference_number'),
                        TextEntry::make('department.name'),
                        TextEntry::make('published_at')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('application_deadline')
                            ->date(),
                        TextEntry::make('attachment_path')
                            ->placeholder('-'),
                        TextEntry::make('status'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}
