<?php

namespace App\Filament\Widgets;

use App\Models\PageVisit;
use Filament\Widgets\ChartWidget;

class TopVisitedPagesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Top Visited Pages';

    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $visits = PageVisit::query()
            ->excludeAssets()
            ->select('url')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        $labels = $visits->pluck('url')->toArray();
        $data = $visits->pluck('count')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Visit Count',
                    'data' => $data,
                    'backgroundColor' => 'rgba(153, 102, 255, 0.6)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
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
