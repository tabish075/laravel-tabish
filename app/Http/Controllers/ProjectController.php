<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $project = Project::create($request->all());

        return response()->json($project, 201);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255',
            'department' => 'string|max:255',
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => 'string|max:50',
        ]);

        $project->update($request->all());

        return response()->json($project, 200);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(null, 204);
    }
}

