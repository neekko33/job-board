<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myJobApplications = auth()->user()->jobApplications()
            ->with([
                'job.employer',
                'job' => fn($q) => $q->withCount('jobApplications')->withAvg('jobApplications', 'expected_salary'),
            ])
            ->latest()
            ->get();
        return view('my_job_applications.index', ['applications' => $myJobApplications]);
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return to_route('my-job-applications.index')->with('success', 'Job application withdrawn successfully.');
    }
}
