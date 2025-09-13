<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;

class EmployerPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer === null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employer $employer): bool
    {
        return $user->id === $employer->user_id;
    }
}
