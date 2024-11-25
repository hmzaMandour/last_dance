<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $userTasks = Task::where('creator_id', $user->id)->get();

        $teamTasks = Task::whereIn('team_id', $user->teams->pluck('id'))->orWhere('assigned_to', $user->id)->get();

        // $teamTasks = Task::where('creator_id', $user->id)->orWhere('assigned_to', $user->id)
        //     ->orderBy('priority', 'asc')
        //     ->get();


        $tasks = $userTasks->merge($teamTasks);

        return view('Tasks.showTasks', compact('tasks' , 'teamTasks' , 'userTasks'));
    }




    public function todoList()
    {
        $user = auth()->user();
        $tasks = Task::where('creator_id', $user->id)->orWhere('assigned_to', $user->id)
            ->orderBy('priority', 'asc')
            ->get()
            ->groupBy('status');

        return view('tasks.todo', compact('tasks'));
    }

    public function index2()
    {
        return view('Tasks.calendar');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = auth()->user();
        $events =Task::where('creator_id', $user->id)->get();

        $events = $events->map(function ($e) {
            $user = User::where("id", $e->user_id)->first();
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner" => $e->user_id,
                "color" => "#1c1c1c",
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
            'name' => 'required',
            'description' => 'required',
            'start' => 'required',
            'end' => 'required',
            'priority' => 'required',
            'assigned_to' => 'nullable',
            'team_id' => 'nullable',
        ]);

        $teamId = $request->team_id;
        $user = auth()->user();

        if ($teamId) {
            $teams = Team::where('id', $teamId)->first();
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

        return redirect()->route('team.index')->with('success', 'Task created successfully!');
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
        Gate::authorize('destroy-task', $task);
        $task->delete();
        return back()->with('success' , 'You deleted this task successfully!! ');
    }
}
