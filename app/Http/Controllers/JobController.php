<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $jobs = Job::query()
            ->orderBy('created_at', 'DESC')
            ->filter($request->only('filter'))
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Job/Index', [
            'jobs' => $jobs,
            'filters' => $request->all('filter'),
            'message' => session('message'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render(
            'Job/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'jname' => 'required|string|max:255',
            'jslug' => 'required|unique:jobs|string|max:255',
            'jserial' => 'required|unique:jobs|string|max:255'
        ]);
        Job::create([
            'jname' => $request->jname,
            'jslug' => $request->jslug,
            'jserial' => $request->jserial,
            'jdescription' => $request->jdescription
        ]);

        return redirect()->route('jobs.index')->with('message', 'Job Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
        return Inertia::render(
            'Job/View',
            [
                'job' => $job
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
        return Inertia::render(
            'Job/Edit',
            [
                'job' => $job
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
        $request->validate([
            'jname' => 'required|string|max:255',
            'jslug' => 'required||unique:jobs,jslug,'.$job->id.',id|string|max:255'
        ]);
        $job->update([
            'jname' => $request->jname,
            'jslug' => $request->jslug,
            'jserial' => $request->jserial,
            'jdescription' => $request->jdescription
        ]);

        return redirect()->route('jobs.index')->with('message', 'Job Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
        $job->delete();
        return redirect()->route('jobs.index')->with('message', 'Job Post Deleted Successfully');
    }
}
