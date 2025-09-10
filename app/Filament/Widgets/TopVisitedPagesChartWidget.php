<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopVisitedPagesChartWidget extends ChartWidget
{
    protected ?string $heading = 'Top Visited Pages';

    protected static ?int $sort = 5;

    protected function getData(): array
    {
        $visits = DB::table('page_visits')
            ->select('url', DB::raw('COUNT(*) as count'))
            ->where('url', 'not like', '/storage/%') // exclude image/media hits
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        // dd($visits->toArray());

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
