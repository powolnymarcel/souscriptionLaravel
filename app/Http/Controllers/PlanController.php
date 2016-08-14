<?php

namespace App\Http\Controllers;
use App\Plan;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlanController extends Controller
{
    public function index()
    {
        return view('plans.index')->with([
            'plans' => Plan::get(),
        ]);
    }

    public function montrerPlan(Request $request,Plan $plan)
    {
        if ($request->user()->subscribedToPlan($plan->braintree_plan,'main')){
            return redirect()->route('home');
        }

            return view('plans.montrer_plan')->withPlan($plan);
    }
}
