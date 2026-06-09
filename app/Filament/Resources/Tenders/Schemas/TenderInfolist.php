<?php

namespace App\Filament\Resources\Tenders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TenderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('reference_number'),
                TextEntry::make('opening_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('closing_date')
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
            ]);
    }
}
