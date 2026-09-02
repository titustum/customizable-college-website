<?php

namespace App\Filament\Resources\ServiceCharters\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ServiceCharterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Charter Details')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedClipboardDocumentCheck)
                    ->schema([
                        TextEntry::make('title_en')
                            ->label('Title (English)'),
                        TextEntry::make('title_sw')
                            ->label('Title (Kiswahili)'),
                        TextEntry::make('description_en')
                            ->label('Description (English)')
                            ->columnSpanFull(),
                        TextEntry::make('description_sw')
                            ->label('Description (Kiswahili)')
                            ->columnSpanFull(),
                        TextEntry::make('commitments_en')
                            ->label('Commitments (English)')
                            ->listWithLineBreaks()
                            ->columnSpanFull(),
                        TextEntry::make('commitments_sw')
                            ->label('Commitments (Kiswahili)')
                            ->listWithLineBreaks()
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Files')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedPaperClip)
                    ->schema([
                        ImageEntry::make('image_en')
                            ->label('Image (English)')
                            ->placeholder('-'),
                        ImageEntry::make('image_sw')
                            ->label('Image (Kiswahili)')
                            ->placeholder('-'),
                        TextEntry::make('audio_en')
                            ->label('Audio (English)')
                            ->placeholder('-'),
                        TextEntry::make('audio_sw')
                            ->label('Audio (Kiswahili)')
                            ->placeholder('-'),
                        TextEntry::make('pdf_en')
                            ->label('Charter PDF (English)')
                            ->placeholder('-'),
                        TextEntry::make('pdf_sw')
                            ->label('Charter PDF (Kiswahili)')
                            ->placeholder('-'),
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
