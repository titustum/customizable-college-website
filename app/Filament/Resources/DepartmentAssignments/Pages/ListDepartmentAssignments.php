<?php

namespace App\Filament\Resources\DepartmentAssignments\Pages;

use App\Filament\Resources\DepartmentAssignments\DepartmentAssignmentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDepartmentAssignments extends ListRecords
{
    protected static string $resource = DepartmentAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
