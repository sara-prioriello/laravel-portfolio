<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('projects.index');
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $data = $request->all();
         
        $newProject = new Project();

        $newProject -> name = $data['name'];
        $newProject -> description = $data['description'];
        $newProject->customer = $data['customer'];
        $newProject->period = $data['period'];

           // dd($newProject);
            $newProject -> save();

return redirect()->route('projects.show', $newProject);
            
            }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
       return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
      
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->customer = $data['customer'];
        $project->period = $data['period'];

        $project->update();

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
