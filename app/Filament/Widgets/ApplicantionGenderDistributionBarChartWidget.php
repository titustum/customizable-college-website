<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ApplicantionGenderDistributionBarChartWidget extends ChartWidget
{
    protected ?string $heading = 'Gender Distribution of Applicants';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 1;

    protected function getData(): array
    {
        // Group applications by gender
        $genderData = DB::table('applications')
            ->selectRaw('gender, COUNT(*) as count')
            ->groupBy('gender')
            ->get();

        $labels = $genderData->pluck('gender')->toArray();
        $counts = $genderData->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Number of Applicants',
                    'data' => $counts,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.7)',   // red - male
                        'rgba(54, 162, 235, 0.7)',   // blue - female
                        'rgba(255, 206, 86, 0.7)',   // yellow - other
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
