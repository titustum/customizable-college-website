<?php

namespace App\Filament\Resources\Uploads\Schemas;

use Filament\Schemas\Schema;

class UploadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //
            ]);
    }
}
