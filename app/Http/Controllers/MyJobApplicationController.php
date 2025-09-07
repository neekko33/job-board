<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myJobApplications = auth()->user()->jobApplications()->with('job')->latest()->get();
        return view('my_job_applications.index', ['applications' => $myJobApplications]);
    }

    public function destroy(string $id)
    {
        auth()->user()->jobApplications()->where('id', $id)->delete();
        return to_route('my-job-applications.index')->with('success', 'Job application withdrawn successfully.');
    }
}
