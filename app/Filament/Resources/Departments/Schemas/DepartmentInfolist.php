<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DepartmentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Department Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        ImageEntry::make('photo')->disk('public'),
                        TextEntry::make('short_description')->columnSpanFull(),
                        TextEntry::make('full_description')->columnSpanFull(),
                        ImageEntry::make('banner_photo')->disk('public'),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),

                    ]),
            ]);
    }
}
