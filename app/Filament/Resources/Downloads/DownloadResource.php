<?php

namespace App\Filament\Resources\Downloads;

use App\Filament\Resources\Downloads\Pages\CreateDownload;
use App\Filament\Resources\Downloads\Pages\EditDownload;
use App\Filament\Resources\Downloads\Pages\ListDownloads;
use App\Filament\Resources\Downloads\Pages\ViewDownload;
use App\Filament\Resources\Downloads\Schemas\DownloadForm;
use App\Filament\Resources\Downloads\Schemas\DownloadInfolist;
use App\Filament\Resources\Downloads\Tables\DownloadsTable;
use App\Models\Download;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DownloadResource extends Resource
{
    protected static ?string $model = Download::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowDownOnSquareStack;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::ArrowDownOnSquareStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return DownloadForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DownloadInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DownloadsTable::configure($table);
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
            'index' => ListDownloads::route('/'),
            'create' => CreateDownload::route('/create'),
            'view' => ViewDownload::route('/{record}'),
            'edit' => EditDownload::route('/{record}/edit'),
        ];
    }
}
