<?php

namespace App\Filament\Resources\PastPapers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class PastPaperInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Past Paper Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedDocumentText)
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('course.name'),
                        TextEntry::make('unit_name'),
                        TextEntry::make('exam_type'),
                        TextEntry::make('exam_year')
                            ->numeric(),
                        TextEntry::make('term')
                            ->placeholder('-'),
                        TextEntry::make('file_path')
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
