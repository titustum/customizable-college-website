<?php

namespace App\Filament\Resources\Vacancies;

use App\Filament\Resources\Vacancies\Pages\CreateVacancy;
use App\Filament\Resources\Vacancies\Pages\EditVacancy;
use App\Filament\Resources\Vacancies\Pages\ListVacancies;
use App\Filament\Resources\Vacancies\Pages\ViewVacancy;
use App\Filament\Resources\Vacancies\Schemas\VacancyForm;
use App\Filament\Resources\Vacancies\Schemas\VacancyInfolist;
use App\Filament\Resources\Vacancies\Tables\VacanciesTable;
use App\Models\Vacancy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VacancyResource extends Resource
{
    protected static ?string $model = Vacancy::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentMagnifyingGlass;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::DocumentMagnifyingGlass;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return VacancyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VacancyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VacanciesTable::configure($table);
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
            'index' => ListVacancies::route('/'),
            'create' => CreateVacancy::route('/create'),
            'view' => ViewVacancy::route('/{record}'),
            'edit' => EditVacancy::route('/{record}/edit'),
        ];
    }
}
