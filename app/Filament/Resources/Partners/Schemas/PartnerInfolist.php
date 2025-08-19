<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class PartnerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                 Section::make('Partner Details')
                ->columns(2)
                ->columnSpan('full')
                ->schema([
                TextEntry::make('name'),
                ImageEntry::make('logo')->disk('public'),
                TextEntry::make('website'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),

                ])
            ]);
    }
}
