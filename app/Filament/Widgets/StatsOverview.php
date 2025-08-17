<?php

namespace App\Filament\Widgets;

use App\Models\Applicant;
use App\Models\Department;
use App\Models\Course; 
use App\Models\TeamMember;  
// use App\Models\NewsPost;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Icons\Heroicon;

class StatsOverview extends StatsOverviewWidget
{

    protected static ?int $sort = 1; 

    protected int|string|array $columnSpan = 'full'; // Ensure it's full width and first


    protected function getStats(): array
    {
        return [
            Stat::make('Departments', Department::count())
                ->description('Total academic departments')
                ->color('info')
                ->url(route('filament.admin.resources.departments.index'))
                ->icon(Heroicon::OutlinedBuildingLibrary, 'Admin link'),

            Stat::make('Courses', Course::count())
                ->description('Certificate, Diploma, Artisan etc.')
                ->color('success')
                ->url(route('filament.admin.resources.courses.index'))
                ->icon(Heroicon::OutlinedBookOpen, 'Admin link'),

            Stat::make('TeamMembers', TeamMember::count())
                ->description('Total team members')
                ->color('success')
                ->url(route('filament.admin.resources.team-members.index'))
                ->icon(Heroicon::OutlinedUserGroup, 'Admin link'),

            Stat::make('Applications', Applicant::count())
                ->description('Submitted admission forms')
                ->color('warning')
                ->url(route('filament.admin.resources.applicants.index'))
                ->icon(Heroicon::OutlinedDocument, 'Admin link'),

            // Stat::make('News Posts', NewsPost::count())
            //     ->description('Published announcements')
            //     ->color('primary'),
        ];
    }
}
