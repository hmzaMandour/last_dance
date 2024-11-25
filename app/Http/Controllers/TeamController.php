<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Price;

use Stripe\Webhook;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $team = Team::where('owner_id', $user->id);
        $teamTasks = Team::whereIn('id', $user->teams->pluck('id'));
        // dd($teamTasks);
        $teams = $team->union($teamTasks)->paginate(6);


        return view('Tasks.showTeams', [
            'teams' => $teams,
            'isSubscribed' => $user->isSubscribed(),
            'teamCount' => $user->teams->count(),
        ]);
    }
public function members()
{
    $user = auth()->user();

    $teams = Team::where('owner_id', $user->id)->get();

    return view('Tasks.members', compact('teams'));
}




    public function index2(){
        $user=auth()->user();
        $allTasks= Task::where('creator_id', $user->id)->count();
        $totalDone = Task::where('creator_id' , $user->id)->where('status', 'Done')->count();
        $totalDo = Task::where('creator_id' , $user->id)->where('status', 'Do')->count();
        $totalDoing = Task::where('creator_id' , $user->id)->where('status', 'Doing')->count();
   
        $weeklyProgress = [12, 19, 3, 5, 2, 3, 9];
        return view('dashboard', compact( 'weeklyProgress' , 'totalDone', 'totalDo' , 'totalDoing' , 'allTasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Tasks.create_team' );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('sssssssssssss');
        $user = auth()->user();

        // Check if the user has reached the team limit
        if (!$user->isSubscribed() && $user->teamCount() >= 5) {
            return redirect()->route('team.index')
            ->with('error', 'You have reached the maximum limit of 5 teams. Please subscribe to create more teams.');
        }

        // Validate request input
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        // Create the team
        $team = Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'owner_id' => $user->id,
        ]);

        // Attach the user as the team owner
        $team->members()->attach($user, ['role' => 'Owner']);

        // Redirect back with a success message
        return redirect()->route('team.index')->with('success', 'Team created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();
        return back();
    }

    public function kickmembers(Team $team , $member){

    //    dd($member);
    $team->members()->detach($member);
    return back();
    }


    public function sub()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $prices = Price::all();

        $checkout_session = Session::create([
            'customer' => $user->stripe_customer_id, 
            'line_items' => [[
                'price' => $prices->data[0]->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('subscribe.success'),
            'cancel_url' => route('team.index'),
        ]);

        return redirect()->away($checkout_session->url);
    }










    public function subscriptionSuccess()
    {

        $user = User::where('id' , auth()->user()->id )->first();

        if ($user) {
            $user->status = 'active';
            $user->save();
        } 
        return redirect()->route('team.index')->with('success', 'Your subscription was successful!');
    }
}
