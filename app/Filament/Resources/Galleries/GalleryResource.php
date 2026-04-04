<?php

namespace App\Filament\Resources\Galleries;

use App\Filament\Resources\Galleries\Pages\CreateGallery;
use App\Filament\Resources\Galleries\Pages\EditGallery;
use App\Filament\Resources\Galleries\Pages\ListGalleries;
use App\Filament\Resources\Galleries\Pages\ViewGallery;
use App\Models\Gallery;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\Textarea::make('description'),
                \Filament\Forms\Components\FileUpload::make('image')->image(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                \Filament\Infolists\Components\TextEntry::make('name'),
                \Filament\Infolists\Components\TextEntry::make('description'),
                \Filament\Infolists\Components\ImageEntry::make('image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image'),
                \Filament\Tables\Columns\TextColumn::make('name'),
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
            'index' => ListGalleries::route('/'),
            'create' => CreateGallery::route('/create'),
            'view' => ViewGallery::route('/{record}'),
            'edit' => EditGallery::route('/{record}/edit'),
        ];
    }
}
