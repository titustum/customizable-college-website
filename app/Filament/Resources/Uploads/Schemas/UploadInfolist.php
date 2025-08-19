<?php

namespace App\Filament\Resources\Uploads\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UploadInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Upload Document Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('upload_category_id')
                            ->numeric(),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),
                    ]),
            ]);
    }
}
