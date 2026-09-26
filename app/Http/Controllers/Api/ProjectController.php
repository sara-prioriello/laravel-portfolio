<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;



class ProjectController extends Controller
{
    public function index(){

    $project = Project::with('category')->get();
    return response()->json([
        'success' => true,
        'results' => $project
        ]);

        //return "Sono nella index API dei progetti";
    }

    public function show(Project $project){

        $project->load('category', 'technologies');

        return response()->json([
            'success' => true,
            'results' => $project
            ]);

    }
}
