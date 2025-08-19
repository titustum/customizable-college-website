<?php

namespace App\Filament\Widgets;

use App\Models\Applicant;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentApplications extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full'; // Ensure it's full width and first

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Applicant::query())
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
