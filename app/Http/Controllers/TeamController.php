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

        $t = Team::where('owner_id', $user->id);
        $teamTasks = Team::whereIn('id', $user->teams->pluck('id'));
        // dd($teamTasks);
        $teams = $t->union($teamTasks)->paginate(5);


        return view('Tasks.showTeams', [
            'teams' => $teams,
            'isSubscribed' => $user->isSubscribed(),
            'teamCount' => $user->teams->count(),
        ]);
    }


    public function index2(){
        return view('dashboard');
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
    }


    public function sub()
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $prices = Price::all();

        $checkout_session = Session::create([
            'customer' => $user->stripe_customer_id, // Use the user's Stripe customer ID
            'line_items' => [[
                'price' => $prices->data[0]->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('subscribe.success'),
            'cancel_url' => route('dashboard'),
        ]);

        return redirect()->away($checkout_session->url);
    }


    // public function handleWebhook(Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $payload = $request->getContent();
    //     $sig_header = $request->header('Stripe-Signature');
    //     $endpoint_secret = env('STRIPE_ENDPOINT_SECRET');

    //     try {
    //         $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);

    //         // Log the received event
    //         Log::info('Stripe webhook received', ['event' => $event]);

    //         switch ($event->type) {
    //             case 'checkout.session.completed':
    //                 $session = $event->data->object;
    //                 Log::info('Checkout session completed', ['session' => $session]);
    //                 $this->handleSubscriptionSuccess($session);
    //                 break;
    //             default:
    //                 Log::info('Unhandled event type', ['type' => $event->type]);
    //                 break;
    //         }

    //         return response('Webhook handled', 200);
    //     } catch (Exception $e) {
    //         Log::error('Stripe webhook error', ['message' => $e->getMessage()]);
    //         return response('Webhook error', 400);
    //     }
    // }




    // protected function handleSubscriptionSuccess($session)
    // {
    //     // Retrieve the user associated with the session by their Stripe customer ID
    //     $user = User::where('stripe_customer_id', $session->customer)->first();

    //     if ($user) {
    //         // Update subscription status to 'active'
    //         $user->status = 'active';
    //         $user->team_limit = 10; // Increase team limit
    //         $user->save();
    //     } else {
    //         Log::error('User not found for Stripe customer ID', ['customer_id' => $session->customer]);
    //     }
    // }



    public function subscriptionSuccess()
    {

        $user = User::where('id' , auth()->user()->id )->first();

        if ($user) {
            $user->status = 'active';
            $user->save();
        } 
        return redirect()->route('dashboard')->with('success', 'Your subscription was successful!');
    }
}
