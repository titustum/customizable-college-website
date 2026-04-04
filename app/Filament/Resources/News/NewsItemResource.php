<?php

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\Pages\CreateNewsItem;
use App\Filament\Resources\News\Pages\EditNewsItem;
use App\Filament\Resources\News\Pages\ListNewsItems;
use App\Filament\Resources\News\Pages\ViewNewsItem;
use App\Models\NewsItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class NewsItemResource extends Resource
{
    protected static ?string $model = NewsItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = 13;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\Select::make('news_category_id')
                    ->relationship('category', 'name')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('title')->required(),
                \Filament\Forms\Components\TextInput::make('slug'),
                \Filament\Forms\Components\Textarea::make('excerpt'),
                \Filament\Forms\Components\RichEditor::make('content'),
                \Filament\Forms\Components\FileUpload::make('image')->image(),
                \Filament\Forms\Components\Toggle::make('is_published'),
                \Filament\Forms\Components\DateTimePicker::make('published_at'),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Infolists\Components\TextEntry::make('category.name'),
                \Filament\Infolists\Components\TextEntry::make('title'),
                \Filament\Infolists\Components\TextEntry::make('slug'),
                \Filament\Infolists\Components\ImageEntry::make('image'),
                \Filament\Infolists\Components\BooleanEntry::make('is_published'),
                \Filament\Infolists\Components\TextEntry::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image'),
                \Filament\Tables\Columns\TextColumn::make('category.name'),
                \Filament\Tables\Columns\TextColumn::make('title'),
                \Filament\Tables\Columns\BooleanColumn::make('is_published'),
                \Filament\Tables\Columns\TextColumn::make('published_at'),
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
            'index' => ListNewsItems::route('/'),
            'create' => CreateNewsItem::route('/create'),
            'view' => ViewNewsItem::route('/{record}'),
            'edit' => EditNewsItem::route('/{record}/edit'),
        ];
    }
}
