<?php

namespace App\Filament\Resources\InstitutionSettings;

use App\Filament\Resources\InstitutionSettings\Pages\CreateInstitutionSetting;
use App\Filament\Resources\InstitutionSettings\Pages\EditInstitutionSetting;
use App\Filament\Resources\InstitutionSettings\Pages\ListInstitutionSettings;
use App\Filament\Resources\InstitutionSettings\Pages\ViewInstitutionSetting;
use App\Filament\Resources\InstitutionSettings\Schemas\InstitutionSettingForm;
use App\Filament\Resources\InstitutionSettings\Schemas\InstitutionSettingInfolist;
use App\Filament\Resources\InstitutionSettings\Tables\InstitutionSettingsTable;
use App\Models\InstitutionSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class InstitutionSettingResource extends Resource
{
    protected static ?string $model = InstitutionSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFlag;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return InstitutionSettingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InstitutionSettingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return InstitutionSettingsTable::configure($table);
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
            'index' => ListInstitutionSettings::route('/'),
            'create' => CreateInstitutionSetting::route('/create'),
            'view' => ViewInstitutionSetting::route('/{record}'),
            'edit' => EditInstitutionSetting::route('/{record}/edit'),
        ];
    }
}
