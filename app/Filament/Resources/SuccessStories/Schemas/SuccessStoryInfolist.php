<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SuccessStoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('department_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('photo'),
                TextEntry::make('course'),
                TextEntry::make('year'),
                TextEntry::make('occupation'),
                TextEntry::make('company'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
