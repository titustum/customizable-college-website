<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class FaqInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('FAQ Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedQuestionMarkCircle)
                    ->schema([
                        TextEntry::make('question'),
                        TextEntry::make('sort_order')
                            ->numeric(),
                        TextEntry::make('answer')
                            ->columnSpanFull(),
                        IconEntry::make('is_published')
                            ->boolean(),
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
