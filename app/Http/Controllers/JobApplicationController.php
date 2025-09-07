<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Job $job)
    {
        if ($request->user()->cannot('apply', $job)) {
            abort(403, 'You have already applied for this job.');
        }
        return view('job_applications.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Job $job)
    {
        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000'
            ]),
        ]);

        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted successfully.');
    }
}
