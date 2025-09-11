<?php

namespace App\Filament\Resources\HeroSlideContents;

use App\Filament\Resources\HeroSlideContents\Pages\CreateHeroSlideContent;
use App\Filament\Resources\HeroSlideContents\Pages\EditHeroSlideContent;
use App\Filament\Resources\HeroSlideContents\Pages\ListHeroSlideContents;
use App\Filament\Resources\HeroSlideContents\Pages\ViewHeroSlideContent;
use App\Filament\Resources\HeroSlideContents\Schemas\HeroSlideContentForm;
use App\Filament\Resources\HeroSlideContents\Schemas\HeroSlideContentInfolist;
use App\Filament\Resources\HeroSlideContents\Tables\HeroSlideContentsTable;
use App\Models\HeroSlideContent;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HeroSlideContentResource extends Resource
{
    protected static ?string $model = HeroSlideContent::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPlayCircle;
    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::PlayCircle;
 
    protected static ?string $navigationLabel = 'Hero Slides';

    protected static ?string $recordTitleAttribute = 'title'; 


    public static function form(Schema $schema): Schema
    {
        return HeroSlideContentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return HeroSlideContentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HeroSlideContentsTable::configure($table);
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
            'index' => ListHeroSlideContents::route('/'),
            'create' => CreateHeroSlideContent::route('/create'),
            'view' => ViewHeroSlideContent::route('/{record}'),
            'edit' => EditHeroSlideContent::route('/{record}/edit'),
        ];
    }
}
