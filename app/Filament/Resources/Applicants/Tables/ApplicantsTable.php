<?php

namespace App\Filament\Resources\Applicants\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApplicantsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(), 
                TextColumn::make('gender')
                    ->searchable(), 
                TextColumn::make('course.name')
                    ->sortable(),
                TextColumn::make('start_term')
                    ->searchable(),
                TextColumn::make('high_school')
                    ->searchable(),
                TextColumn::make('high_school_grade')
                    ->searchable(), 
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
