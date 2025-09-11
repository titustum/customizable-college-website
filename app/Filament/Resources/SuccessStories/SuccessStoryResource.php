<?php

namespace App\Filament\Resources\SuccessStories;

use App\Filament\Resources\SuccessStories\Pages\CreateSuccessStory;
use App\Filament\Resources\SuccessStories\Pages\EditSuccessStory;
use App\Filament\Resources\SuccessStories\Pages\ListSuccessStories;
use App\Filament\Resources\SuccessStories\Pages\ViewSuccessStory;
use App\Filament\Resources\SuccessStories\Schemas\SuccessStoryForm;
use App\Filament\Resources\SuccessStories\Schemas\SuccessStoryInfolist;
use App\Filament\Resources\SuccessStories\Tables\SuccessStoriesTable;
use App\Models\SuccessStory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuccessStoryResource extends Resource
{
    protected static ?string $model = SuccessStory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;
    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::Star;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return SuccessStoryForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SuccessStoryInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuccessStoriesTable::configure($table);
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
            'index' => ListSuccessStories::route('/'),
            'create' => CreateSuccessStory::route('/create'),
            'view' => ViewSuccessStory::route('/{record}'),
            'edit' => EditSuccessStory::route('/{record}/edit'),
        ];
    }
}
