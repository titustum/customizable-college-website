<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ApplicantionTrendChartWidget extends ChartWidget
{
    protected ?string $heading = 'Application Trend';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        // Use SQLite-compatible date formatting
        $applications = DB::table('applications')
            ->selectRaw("strftime('%Y-%m', created_at) as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $applications->pluck('month')->toArray();
        $data = $applications->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Number of Applicants',
                    'data' => $data,
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    // 'fill' => false,
                    // 'tension' => 0.5,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
