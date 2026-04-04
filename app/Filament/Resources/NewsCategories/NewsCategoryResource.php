<?php

namespace App\Filament\Resources\NewsCategories;

use App\Filament\Resources\NewsCategories\Pages\CreateNewsCategory;
use App\Filament\Resources\NewsCategories\Pages\EditNewsCategory;
use App\Filament\Resources\NewsCategories\Pages\ListNewsCategories;
use App\Filament\Resources\NewsCategories\Pages\ViewNewsCategory;
use App\Filament\Resources\NewsCategories\Schemas\NewsCategoryForm;
use App\Filament\Resources\NewsCategories\Schemas\NewsCategoryInfolist;
use App\Filament\Resources\NewsCategories\Tables\NewsCategoriesTable;
use App\Models\NewsCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NewsCategoryResource extends Resource
{
    protected static ?string $model = NewsCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?int $navigationSort = 12;

    public static function form(Schema $schema): Schema
    {
        return NewsCategoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NewsCategoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsCategoriesTable::configure($table);
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
            'index' => ListNewsCategories::route('/'),
            'create' => CreateNewsCategory::route('/create'),
            'view' => ViewNewsCategory::route('/{record}'),
            'edit' => EditNewsCategory::route('/{record}/edit'),
        ];
    }
}
