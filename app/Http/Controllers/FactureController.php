<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FactureController extends Controller
{
    public function index(Request $request)
    {
        return view('factures.index')->with([
            'factures' => $request->user()->invoices(),
        ]);
    }

    public function show($factureId, Request $request)
    {
        return $request->user()->downloadInvoice($factureId, [
            'vendor' => 'ONDEGO',
            'product' => 'Abonnement',
        ]);
    }
}
