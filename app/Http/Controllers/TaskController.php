<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userTasks = Task::where('creator_id', $user->id);
        $teamTasks = Task::whereIn('team_id', $user->teams->pluck('id'));
        $tasks = $userTasks->union($teamTasks)->orderBy('deadline', 'asc')->get();

        return view('Tasks.showTasks', compact('tasks'));
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
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'deadline'=>'required',
            'priority'=>'required',
            'assigned_to' => 'nullable',
            'team_id' => 'nullable',
        ]);

        $teamId = $request->team_id;
        $user = auth()->user();

        if ($teamId) {
            $teams = Team::where('id'  , $teamId)->first();


        }

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'priority' => $request->priority,
            'creator_id' => $user->id, 
            'assigned_to' => $request->assigned_to, 
            'team_id' => $teamId, 
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
