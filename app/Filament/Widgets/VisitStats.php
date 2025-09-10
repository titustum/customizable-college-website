<?php

namespace App\Filament\Widgets;

use App\Models\PageVisit;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class VisitStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Stat::make('Total Visits', PageVisit::count()),

            // Stat::make('Today\'s Visits', PageVisit::whereDate('visited_at', today())->count()),

            // Stat::make('This Week\'s Visits', PageVisit::whereBetween('visited_at', [
            //     now()->startOfWeek(),
            //     now()->endOfWeek()
            // ])->count()),
        ];
    }
}
