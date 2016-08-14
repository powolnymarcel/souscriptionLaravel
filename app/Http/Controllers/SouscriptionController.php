<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Http\Requests;

class SouscriptionController extends Controller
{
    public function index()
    {
        return view('souscription.index');
    }

    public function creation(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);

        if ($request->user()->subscribedToPlan($plan->braintree_plan, 'main')) {
            return redirect()->route('home');
        }

        if (!$request->user()->subscribed('main')) {
            $request->user()->newSubscription('main', $plan->braintree_plan)->create($request->payment_method_nonce);
        } else {
            $request->user()->subscription('main')->swap($plan->braintree_plan);
        }

        return redirect()->route('home');
    }


    public function annuler(Request $request)
    {
        $request->user()->subscription('main')->cancel();

        return redirect()->route('souscription.index');
    }

    public function reprendre(Request $request)
    {
        $request->user()->subscription('main')->resume();

        return redirect()->route('souscription.index');
    }
}
