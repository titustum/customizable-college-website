<?php

namespace App\Policies;

use App\Models\User;

class ApplicationPolicy extends BasePolicy
{
    protected function canAccess(User $user): bool
    {
        return $user->isAdministrator() || $user->isRegistrar();
    }
}