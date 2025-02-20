<?php

namespace App\Http\Controllers;

//use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $projects = Project::query()
            ->orderBy('created_at', 'DESC')
            ->filter($request->only('filter'))
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Project/Index', [
            'projects' => $projects,
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
            'Project/Create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'heading' => 'required|string|max:255',
            'slug' => 'required|unique:projects|string|max:255'
        ]);
        Project::create([
            'heading' => $request->heading,
            'slug' => Str::slug($request->slug),
            'description' => $request->description
        ]);

        return redirect()->route('projects.index')->with('message', 'Project Post Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return Inertia::render(
            'Project/View',
            [
                'project' => $project
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return Inertia::render(
            'Project/Edit',
            [
                'project' => $project
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $request->validate([
            'heading' => 'required|string|max:255',
            'slug' => 'required||unique:projects,slug,'.$project->id.',id|string|max:255'
        ]);
        $project->update([
            'heading' => $request->heading,
            'slug' => Str::slug($request->slug),
            'description' => $request->description
        ]);

        return redirect()->route('projects.index')->with('message', 'Project Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return redirect()->route('projects.index')->with('message', 'Project Post Deleted Successfully');
    }
}
