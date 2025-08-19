<?php

namespace App\Filament\Resources\Uploads\Pages;

use App\Filament\Resources\Uploads\UploadResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUpload extends CreateRecord
{
    protected static string $resource = UploadResource::class;
}
