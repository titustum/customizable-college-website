<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

class RecentApplications extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full'; // Ensure it's full width and first

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Application::query())
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
            ->headerActions([
                //
            ])
            ->recordActions([ 
                ViewAction::make('View')
                    ->label('View')
                    ->slideOver()
                    ->stickyModalHeader()
                    ->stickyModalFooter()
                    ->modalWidth('2xl') // Use direct string value; no need for MaxWidth enum
                    ->schema([
                        Section::make('Personal Details')
                            ->schema([
                                TextEntry::make('full_name')->label('Full Name'),
                                TextEntry::make('phone'),
                                TextEntry::make('gender'),
                                TextEntry::make('id_number'),
                            ])
                            ->collapsible(),

                        Section::make('Academic Background')
                            ->schema([
                                TextEntry::make('high_school')->label('High School'),
                                TextEntry::make('high_school_grade')->label('Grade'),
                                TextEntry::make('kcse_index_number')->label('KCSE Index'),
                                TextEntry::make('kcse_year')->label('KCSE Year'),
                            ])
                            ->collapsible(),

                        Section::make('Course Info')
                            ->schema([
                                TextEntry::make('course.name')->label('Course'),
                                TextEntry::make('start_term')->label('Start Term'),
                            ])
                            ->collapsible(),

                        Section::make('Guardian Info')
                            ->schema([
                                TextEntry::make('parent_name')->label('Parent Name'),
                                TextEntry::make('parent_phone')->label('Parent Phone'),
                            ])
                            ->collapsible(),
                    ]),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                  DeleteBulkAction::make(),  
                ]), 
            ]);
    }
}
