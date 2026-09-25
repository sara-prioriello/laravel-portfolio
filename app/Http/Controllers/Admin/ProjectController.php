<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Technology;

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
        //devo aggiungere la logica per passare le categorie alla vista
        $categories = Category::all();
        $technologies = Technology::all();
        return view('projects.create', compact('categories', 'technologies'));
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
        $newProject -> category_id = $data['category_id'];  
        $newProject->customer = $data['customer'];
        $newProject->period = $data['period'];

           // dd($newProject);
            $newProject -> save();
            //DOPO aver salvato il post 
            //controllo se ricevo delle technologies dalla request
            if ($request->has('technologies')) {
        $newProject->technologies()->attach($data['technologies']);
            }
        return redirect()->route('projects.show', $newProject);

        
            
            }
    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('projects.show', compact('project', 'categories', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();  
        $technologies = Technology::all();
        
       
       return view('projects.edit', compact('project', 'categories', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
      
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->category_id = $data['category_id'];
        $project->customer = $data['customer'];
        $project->period = $data['period'];

        $data = request()->all();

        $project->update();

        //dobbiamo controllare se la richiesta contiene le technologies
        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);

        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project -> delete();
        return redirect()->route('projects.index');
    }
}
