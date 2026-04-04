<?php

namespace App\Filament\Resources\GalleryItems;

use App\Filament\Resources\GalleryItems\Pages\CreateGalleryItem;
use App\Filament\Resources\GalleryItems\Pages\EditGalleryItem;
use App\Filament\Resources\GalleryItems\Pages\ListGalleryItems;
use App\Filament\Resources\GalleryItems\Pages\ViewGalleryItem;
use App\Models\GalleryItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 11;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\Select::make('gallery_id')
                    ->relationship('gallery', 'name')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('category'),
                \Filament\Forms\Components\Textarea::make('description'),
                \Filament\Forms\Components\FileUpload::make('image')->image(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Infolists\Components\TextEntry::make('gallery.name'),
                \Filament\Infolists\Components\TextEntry::make('name'),
                \Filament\Infolists\Components\TextEntry::make('category'),
                \Filament\Infolists\Components\ImageEntry::make('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image'),
                \Filament\Tables\Columns\TextColumn::make('gallery.name'),
                \Filament\Tables\Columns\TextColumn::make('name'),
                \Filament\Tables\Columns\TextColumn::make('category'),
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
            'index' => ListGalleryItems::route('/'),
            'create' => CreateGalleryItem::route('/create'),
            'view' => ViewGalleryItem::route('/{record}'),
            'edit' => EditGalleryItem::route('/{record}/edit'),
        ];
    }
}
