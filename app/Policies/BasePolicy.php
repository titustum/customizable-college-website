<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class BasePolicy
{
    /**
     * Whether the authenticated user may act on this model.
     */
    protected function canAccess(User $user): bool
    {
        return $user->isAdministrator();
    }

    public function viewAny(User $user): bool
    {
        return $this->canAccess($user);
    }

    public function view(User $user, Model $model): bool
    {
        return $this->canAccess($user);
    }

    public function create(User $user): bool
    {
        return $this->canAccess($user);
    }

    public function update(User $user, Model $model): bool
    {
        return $this->canAccess($user);
    }

    public function delete(User $user, Model $model): bool
    {
        return $this->canAccess($user);
    }

    public function restore(User $user, Model $model): bool
    {
        return $this->canAccess($user);
    }

    public function forceDelete(User $user, Model $model): bool
    {
        return $this->canAccess($user);
    }
}