<?php

namespace App\Filament\Resources\TeamMembers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeamMembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Staff Photo')
                    ->circular(), // Optional: makes photo round

                TextColumn::make('name')
                    ->label('Full Name')
                    ->searchable()
                    ->sortable(),

                // TextColumn::make('email')
                //     ->label('Email')
                //     ->sortable()
                //     ->searchable(),

                TextColumn::make('department.name')
                    ->label('Department')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('role.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),

                // TextColumn::make('section_assigned')
                //     ->label('Section Assigned')
                //     ->searchable()
                //     ->sortable()
                //     ->placeholder('-'),

                TextColumn::make('qualification')
                    ->label('Qualification')
                    ->sortable()
                    ->searchable(),

                // TextColumn::make('graduation_year')
                //     ->label('Graduation Year')
                //     ->sortable(),
            ])
            ->filters([
                // Add any filters here if needed
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
