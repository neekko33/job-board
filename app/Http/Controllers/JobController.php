<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::query();

        $jobs->when(\request('search'), function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when(\request('min_salary'), function ($query, $minSalary) {
            $query->where('salary', '>=', $minSalary);
        })->when(\request('max_salary'), function ($query, $maxSalary) {
            $query->where('salary', '<=', $maxSalary);
        })->when(\request('experience'), function ($query, $experience) {
           $query->where('experience', $experience);
        })->when(\request('category'), function ($query, $category) {
            $query->where('category', $category);
        });

        return view('jobs.index', ['jobs' => $jobs->paginate(10)->withQueryString()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
