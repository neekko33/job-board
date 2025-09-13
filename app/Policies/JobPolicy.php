<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function apply(User $user, Job $job): bool
    {
        return !$job->hasUserApplied($user) && $job->employer->user_id !== $user->id;
    }

    public function update(User $user, Job $job): bool | Response
    {
        if ($job->employer->user_id !== $user->id) {
            return false;
        }

        if ($job->jobApplications()->count() > 0) {
            return Response::deny('Cannot update job with existing applications.');
        }

        return true;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->id === $job->employer->user_id;
    }
}
