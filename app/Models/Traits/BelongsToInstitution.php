<?php

namespace App\Models\Traits;

use App\Models\Institution;
use App\Models\Scopes\InstitutionScope;
use App\Support\InstitutionContext;

trait BelongsToInstitution
{
    protected static function bootBelongsToInstitution(): void
    {
        static::addGlobalScope(new InstitutionScope);

        static::creating(function ($model) {
            if (InstitutionContext::check() && empty($model->institution_id)) {
                $model->institution_id = InstitutionContext::id();
            }
        });
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
