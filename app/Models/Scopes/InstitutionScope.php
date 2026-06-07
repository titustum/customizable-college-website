<?php

namespace App\Models\Scopes;

use App\Support\InstitutionContext;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class InstitutionScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (InstitutionContext::check()) {
            $builder->where(
                $model->getTable().'.institution_id',
                InstitutionContext::id()
            );
        }
    }
}
