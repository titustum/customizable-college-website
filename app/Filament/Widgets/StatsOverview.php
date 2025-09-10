<?php

namespace App\Filament\Widgets;

use App\Models\Application;
use App\Models\Course;
use App\Models\Department;
use App\Models\TeamMember;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Departments', Department::count())
                ->description('Academic divisions offering programs')
                ->color('info')
                ->icon(Heroicon::OutlinedBuildingOffice)
                ->chart($this->getWeeklyTrend(Department::class, 'created_at'))
                ->url(route('filament.admin.resources.departments.index')),

            Stat::make('Courses', Course::count())
                ->description('Diploma, Certificate, Artisan programs')
                ->color('success')
                ->icon(Heroicon::OutlinedBookOpen)
                ->chart($this->getWeeklyTrend(Course::class, 'created_at'))
                ->url(route('filament.admin.resources.courses.index')),

            Stat::make('Team Members', TeamMember::count())
                ->description('Lecturers, trainers, and staff')
                ->color('primary')
                ->icon(Heroicon::OutlinedUserGroup)
                ->chart($this->getWeeklyTrend(TeamMember::class, 'created_at'))
                ->url(route('filament.admin.resources.team-members.index')),

            Stat::make('Applications', Application::count())
                ->description('Submitted admission forms')
                ->color('warning')
                ->icon(Heroicon::OutlinedDocumentText)
                ->chart($this->getWeeklyTrend(Application::class, 'created_at'))
                ->url(route('filament.admin.resources.applications.index')),
        ];
    }

    /**
     * Returns 7-day trend data for a given model.
     */
    protected function getWeeklyTrend(string $model, string $dateColumn = 'created_at'): array
    {
        $start = now()->subDays(6)->startOfDay();

        $records = $model::query()
            ->whereDate($dateColumn, '>=', $start)
            ->get()
            ->groupBy(fn ($item) => \Illuminate\Support\Carbon::parse($item->$dateColumn)->format('Y-m-d'));

        $trend = [];

        for ($i = 0; $i < 7; $i++) {
            $day = now()->subDays(6 - $i)->format('Y-m-d');
            $trend[] = $records->get($day, collect())->count(); // 👈 safer access
        }

        return $trend;
    }
}
