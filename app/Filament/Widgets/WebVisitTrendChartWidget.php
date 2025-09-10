<?php

namespace App\Filament\Widgets;

use App\Models\PageVisit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class WebVisitTrendChartWidget extends ChartWidget
{
    protected ?string $heading = 'Web Visit Trend';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Fetch recent visits (last 30 days to limit data size)
        $visits = PageVisit::where('visited_at', '>=', now()->subDays(30))->get();

        // Group visits by day (format: YYYY-MM-DD)
        $grouped = $visits->groupBy(function ($visit) {
            return Carbon::parse($visit->visited_at)->format('Y-m-d');
        });

        $labels = $grouped->keys()->sort()->values()->all();
        $data = $grouped->map->count()->sortKeys()->values()->all();

        return [
            'datasets' => [
                [
                    'label' => 'Page Visits',
                    'data' => $data,
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
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
