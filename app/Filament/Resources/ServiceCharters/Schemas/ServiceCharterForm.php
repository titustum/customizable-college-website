<?php

namespace App\Filament\Resources\ServiceCharters\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ServiceCharterForm
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
                        TextInput::make('title_en')
                            ->label('Title (English)')
                            ->required(),
                        TextInput::make('title_sw')
                            ->label('Title (Kiswahili)')
                            ->required(),
                        Textarea::make('description_en')
                            ->label('Description (English)')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('description_sw')
                            ->label('Description (Kiswahili)')
                            ->required()
                            ->columnSpanFull(),
                        TagsInput::make('commitments_en')
                            ->label('Commitments (English)')
                            ->required()
                            ->columnSpanFull(),
                        TagsInput::make('commitments_sw')
                            ->label('Commitments (Kiswahili)')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Media & Files')
                    ->columns(2)
                    ->columnSpanFull()
                    ->icon(Heroicon::OutlinedPaperClip)
                    ->schema([
                        FileUpload::make('image_en')
                            ->label('Image (English)')
                            ->image()
                            ->disk('public')
                            ->directory('service-charters/images'),
                        FileUpload::make('image_sw')
                            ->label('Image (Kiswahili)')
                            ->image()
                            ->disk('public')
                            ->directory('service-charters/images'),
                        FileUpload::make('audio_en')
                            ->label('Audio (English)')
                            ->disk('public')
                            ->directory('service-charters/audios')
                            ->acceptedFileTypes(['audio/*']),
                        FileUpload::make('audio_sw')
                            ->label('Audio (Kiswahili)')
                            ->disk('public')
                            ->directory('service-charters/audios')
                            ->acceptedFileTypes(['audio/*']),
                        FileUpload::make('pdf_en')
                            ->label('Charter PDF (English)')
                            ->disk('public')
                            ->directory('service-charters/pdfs')
                            ->acceptedFileTypes(['application/pdf']),
                        FileUpload::make('pdf_sw')
                            ->label('Charter PDF (Kiswahili)')
                            ->disk('public')
                            ->directory('service-charters/pdfs')
                            ->acceptedFileTypes(['application/pdf']),
                        Toggle::make('is_published')
                            ->required()
                            ->columnSpan(2),
                    ]),
            ]);
    }
}
