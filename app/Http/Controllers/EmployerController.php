<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Gate::authorize('create', Employer::class);
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Employer::class);
        $request->user()->employer()->create(
            $request->validate([
                'company_name' => 'required|string|min:3|unique:employers,company_name',
            ])
        );

        return redirect()->route('jobs.index')->with('success', 'Employer profile created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
