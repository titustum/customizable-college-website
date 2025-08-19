<?php

namespace App\Filament\Resources\SuccessStories\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;

class SuccessStoryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
            Section::make('Success Story Details')
                ->columns(2)
                ->columnSpan('full')
                ->schema([

                    TextEntry::make('department.name'),
                    TextEntry::make('name'),
                    ImageEntry::make('photo')
                        ->disk('public')
                        ->label('Photo')
                        ->square()
                        ->extraImgAttributes([
                            'alt' => 'Success Story Photo',
                            'loading' => 'lazy',
                            'class' => 'rounded-md'
                        ]),
                    TextEntry::make('course'),
                    TextEntry::make('year'),
                    TextEntry::make('occupation'),
                    TextEntry::make('company'),
                    TextEntry::make('created_at')
                        ->dateTime(),
                    TextEntry::make('updated_at')
                        ->dateTime(),
                    TextEntry::make('statement')
                ])
            ]);
    }
}
