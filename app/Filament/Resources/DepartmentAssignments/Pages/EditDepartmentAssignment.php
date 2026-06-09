<?php

namespace App\Filament\Resources\DepartmentAssignments\Pages;

use App\Filament\Resources\DepartmentAssignments\DepartmentAssignmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDepartmentAssignment extends EditRecord
{
    protected static string $resource = DepartmentAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
