<?php

namespace App\Filament\Resources\ServiceCharters;

use App\Filament\Resources\ServiceCharters\Pages\ManageServiceCharter;
use App\Filament\Resources\ServiceCharters\Schemas\ServiceCharterForm;
use App\Filament\Resources\ServiceCharters\Schemas\ServiceCharterInfolist;
use App\Filament\Resources\ServiceCharters\Tables\ServiceChartersTable;
use App\Models\ServiceCharter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceCharterResource extends Resource
{
    protected static ?string $model = ServiceCharter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentCheck;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::ClipboardDocumentCheck;

    protected static ?string $recordTitleAttribute = 'title_en';

    protected static ?int $navigationSort = 15;

    public static function form(Schema $schema): Schema
    {
        return ServiceCharterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ServiceCharterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceChartersTable::configure($table);
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
            'index' => ManageServiceCharter::route('/'),
        ];
    }
}
