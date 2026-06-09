<?php

namespace App\Filament\Resources\Tenders;

use App\Filament\Resources\Tenders\Pages\CreateTender;
use App\Filament\Resources\Tenders\Pages\EditTender;
use App\Filament\Resources\Tenders\Pages\ListTenders;
use App\Filament\Resources\Tenders\Pages\ViewTender;
use App\Filament\Resources\Tenders\Schemas\TenderForm;
use App\Filament\Resources\Tenders\Schemas\TenderInfolist;
use App\Filament\Resources\Tenders\Tables\TendersTable;
use App\Models\Tender;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TenderResource extends Resource
{
    protected static ?string $model = Tender::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TenderForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TenderInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TendersTable::configure($table);
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
            'index' => ListTenders::route('/'),
            'create' => CreateTender::route('/create'),
            'view' => ViewTender::route('/{record}'),
            'edit' => EditTender::route('/{record}/edit'),
        ];
    }
}
