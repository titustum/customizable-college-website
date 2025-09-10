<?php

namespace App\Filament\Resources\PastPapers\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PastPaperInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('course_id')
                    ->numeric(),
                TextEntry::make('unit_name'),
                TextEntry::make('exam_type'),
                TextEntry::make('exam_year')
                    ->numeric(),
                TextEntry::make('term'),
                TextEntry::make('file_path'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
