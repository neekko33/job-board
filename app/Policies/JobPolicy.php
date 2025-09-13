<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;

class JobPolicy
{
    public function apply(User $user, Job $job): bool
    {
        return !$job->hasUserApplied($user) && $job->employer->user_id !== $user->id;
    }

    public function update(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }
}
