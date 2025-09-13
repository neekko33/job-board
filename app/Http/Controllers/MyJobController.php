<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myJobs = auth()->user()->employer->jobs()
            ->with('jobApplications')
            ->latest()
            ->get();
        return view('my_jobs.index', compact('myJobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_jobs.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $request->user()->employer->jobs()->create($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        Gate::authorize('update', $myJob);
        return view('my_jobs.edit', [
            'myJob' => $myJob,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        Gate::authorize('update', $myJob);
        $myJob->update($request->validated());
        return redirect()->route('my-jobs.index')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        Gate::authorize('delete', $myJob);
        $myJob->delete();
        return redirect()->route('my-jobs.index')->with('success', 'Job deleted successfully.');
    }
}
