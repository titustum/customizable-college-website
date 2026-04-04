<?php

namespace App\Filament\Resources\NewsCategories;

use App\Filament\Resources\NewsCategories\Pages\CreateNewsCategory;
use App\Filament\Resources\NewsCategories\Pages\EditNewsCategory;
use App\Filament\Resources\NewsCategories\Pages\ListNewsCategories;
use App\Filament\Resources\NewsCategories\Pages\ViewNewsCategory;
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

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 12;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('slug')->required(),
                \Filament\Forms\Components\Textarea::make('description'),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Infolists\Components\TextEntry::make('name'),
                \Filament\Infolists\Components\TextEntry::make('slug'),
                \Filament\Infolists\Components\TextEntry::make('description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('name'),
                \Filament\Tables\Columns\TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                \Filament\Tables\Actions\ViewAction::make(),
                \Filament\Tables\Actions\EditAction::make(),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
