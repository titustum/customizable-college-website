<?php

namespace App\Filament\Resources\DepartmentAssignments;

use App\Filament\Resources\DepartmentAssignments\Pages\CreateDepartmentAssignment;
use App\Filament\Resources\DepartmentAssignments\Pages\EditDepartmentAssignment;
use App\Filament\Resources\DepartmentAssignments\Pages\ListDepartmentAssignments;
use App\Filament\Resources\DepartmentAssignments\Schemas\DepartmentAssignmentForm;
use App\Filament\Resources\DepartmentAssignments\Tables\DepartmentAssignmentsTable;
use App\Models\DepartmentAssignment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DepartmentAssignmentResource extends Resource
{
    protected static ?string $model = DepartmentAssignment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'custom_title';

    public static function form(Schema $schema): Schema
    {
        return DepartmentAssignmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartmentAssignmentsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDepartmentAssignments::route('/'),
            'create' => CreateDepartmentAssignment::route('/create'),
            'edit' => EditDepartmentAssignment::route('/{record}/edit'),
        ];
    }
}
