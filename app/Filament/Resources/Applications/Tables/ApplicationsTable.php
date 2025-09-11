<?php

namespace App\Filament\Resources\Applications\Tables;

use App\Filament\Exports\ApplicationExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        // decending
        $table->defaultSort('created_at', 'desc');

        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                // TextColumn::make('alternative_phone')
                //     ->searchable(),
                TextColumn::make('id_number')
                    ->searchable(),
                TextColumn::make('course.name')
                    ->searchable(),
                TextColumn::make('start_term')
                    ->searchable(),
                TextColumn::make('high_school')
                    ->searchable(),
                TextColumn::make('high_school_grade')
                    ->searchable(),
                TextColumn::make('kcse_index_number')
                    ->searchable(),
                TextColumn::make('kcse_year'),
                // TextColumn::make('nemis_upi_number')
                //     ->searchable(),
                TextColumn::make('parent_name')
                    ->searchable(),
                TextColumn::make('parent_phone')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Applied On')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(ApplicationExporter::class),
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
