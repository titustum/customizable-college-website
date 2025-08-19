<?php

namespace App\Filament\Resources\UploadCategories;

use App\Filament\Resources\UploadCategories\Pages\CreateUploadCategory;
use App\Filament\Resources\UploadCategories\Pages\EditUploadCategory;
use App\Filament\Resources\UploadCategories\Pages\ListUploadCategories;
use App\Filament\Resources\UploadCategories\Pages\ViewUploadCategory;
use App\Filament\Resources\UploadCategories\Schemas\UploadCategoryForm;
use App\Filament\Resources\UploadCategories\Schemas\UploadCategoryInfolist;
use App\Filament\Resources\UploadCategories\Tables\UploadCategoriesTable;
use App\Models\UploadCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UploadCategoryResource extends Resource
{
    protected static ?string $model = UploadCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return UploadCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UploadCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UploadCategoriesTable::configure($table);
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
            'index' => ListUploadCategories::route('/'),
            'create' => CreateUploadCategory::route('/create'),
            'view' => ViewUploadCategory::route('/{record}'),
            'edit' => EditUploadCategory::route('/{record}/edit'),
        ];
    }
}
