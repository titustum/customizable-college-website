<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Course Details')
                    ->columns(2)
                    ->columnSpan('full')
                    ->schema([

                        TextEntry::make('department.name')
                            ->numeric(),
                        TextEntry::make('name'),
                        TextEntry::make('photo'),
                        TextEntry::make('requirement'),
                        TextEntry::make('duration'),
                        TextEntry::make('exam_body'),
                        TextEntry::make('created_at')
                            ->dateTime(),
                        TextEntry::make('updated_at')
                            ->dateTime(),

                    ]),
            ]);
    }
}
