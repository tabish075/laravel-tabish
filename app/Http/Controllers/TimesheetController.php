<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index()
    {
        return Timesheet::all();
    }

    public function show($id)
    {
        return Timesheet::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'task_name' => 'required|string|max:255',
            'date' => 'required|date',
            'hours' => 'required|integer',
        ]);

        $timesheet = Timesheet::create($request->all());

        return response()->json($timesheet, 201);
    }

    public function update(Request $request, $id)
    {
        $timesheet = Timesheet::findOrFail($id);

        $request->validate([
            'user_id' => 'exists:users,id',
            'project_id' => 'exists:projects,id',
            'task_name' => 'string|max:255',
            'date' => 'date',
            'hours' => 'integer',
        ]);

        $timesheet->update($request->all());

        return response()->json($timesheet, 200);
    }

    public function destroy($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->delete();

        return response()->json(null, 204);
    }
}


