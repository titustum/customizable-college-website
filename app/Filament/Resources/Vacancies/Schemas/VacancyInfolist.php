<?php

namespace App\Filament\Resources\Vacancies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class VacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('reference_number'),
                TextEntry::make('department.name')
                    ->numeric(),
                TextEntry::make('published_at')
                    ->date(),
                TextEntry::make('application_deadline')
                    ->date(),
                TextEntry::make('attachment_path'),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
