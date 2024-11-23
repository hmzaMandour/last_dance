<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
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
        $tasks = $userTasks->union($teamTasks)->get();

        return view('Tasks.showTasks', compact('tasks'));
    }

    public function todoList()
    {
        $tasks = Task::where('creator_id', auth()->id()) 
            ->orderBy('priority', 'asc')
            ->get()
            ->groupBy('status'); 

        return view('tasks.todo', compact('tasks'));
    }

    public function index2(){
        return view('Tasks.calendar');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $events = Task::all();

        $events = $events->map(function ($e) {
            $user = User::where("id", $e->user_id)->first();
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner" => $e->user_id,
                "color" => "#000",
                "passed" => false,
                "title" => "Course : $e->name",
                "name" => $e->name,
                "description" => $e->description,
                "places" => $e->places,
                "start_time" => $e->start,
                "end_time" => $e->end,
            ];
        });

        return response()->json([
            "events" => $events
        ]);
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
            'start'=>'required',
            'end'=>'required',
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
            'start' => $request->start,
            'end' => $request->end,
            'priority' => $request->priority,
            'status' => 'Do',
            'creator_id' => $user->id,
            'assigned_to' => $request->assigned_to,
            'team_id' => $teamId,
            
        ]);

        return back();
    }

    public function updateStatus(Request $request, Task $task)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);


        $task->update(['status' => $validated['status']]);
        return response()->json(['message' => 'Task status updated successfully.'], 200);
 
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
