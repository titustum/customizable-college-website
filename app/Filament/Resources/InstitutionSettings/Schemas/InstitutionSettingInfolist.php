<?php

namespace App\Filament\Resources\InstitutionSettings\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class InstitutionSettingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Institution Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedCog6Tooth)
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('motto')
                            ->placeholder('-'),
                        TextEntry::make('primary_color')
                            ->placeholder('-'),
                        TextEntry::make('primary_font')
                            ->placeholder('-'),
                        TextEntry::make('phone')
                            ->placeholder('-'),
                        TextEntry::make('email')
                            ->label('Email address')
                            ->placeholder('-'),
                        TextEntry::make('facebook')
                            ->placeholder('-'),
                        TextEntry::make('tiktok')
                            ->placeholder('-'),
                        TextEntry::make('x')
                            ->placeholder('-'),
                        TextEntry::make('youtube')
                            ->placeholder('-'),
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
