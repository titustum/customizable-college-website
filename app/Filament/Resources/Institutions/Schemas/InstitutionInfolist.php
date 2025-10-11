<?php

namespace App\Filament\Resources\Institutions\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class InstitutionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('principal_name'),
                TextEntry::make('principal_photo'),
                TextEntry::make('motto'),
                TextEntry::make('primary_color'),
                TextEntry::make('primary_font'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('facebook'),
                TextEntry::make('tiktok'),
                TextEntry::make('x'),
                TextEntry::make('youtube'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
