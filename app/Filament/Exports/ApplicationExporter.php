<?php

namespace App\Filament\Exports;

use App\Models\Application;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class ApplicationExporter extends Exporter
{
    protected static ?string $model = Application::class;

    protected static ?string $filename = 'applications-export.csv';

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('full_name'),
            ExportColumn::make('phone'),
            ExportColumn::make('alternative_phone'),
            ExportColumn::make('gender'),
            ExportColumn::make('id_number'),
            ExportColumn::make('course.name')
                ->label('course name'),
            ExportColumn::make('start_term'),
            ExportColumn::make('high_school'),
            ExportColumn::make('high_school_grade'),
            ExportColumn::make('kcse_index_number'),
            ExportColumn::make('kcse_year'),
            ExportColumn::make('nemis_upi_number'),
            ExportColumn::make('parent_name'),
            ExportColumn::make('parent_phone'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your application export has completed and '.Number::format($export->successful_rows).' '.str('row')->plural($export->successful_rows).' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' '.Number::format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to export.';
        }

        return $body;
    }
}
