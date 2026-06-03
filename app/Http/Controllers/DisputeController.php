<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DisputeController extends Controller
{
    public function index(): View
    {
        return view('disputes.index');
    }

    public function show(string $id): View
    {
        return view('disputes.show', ['disputeId' => strtoupper($id)]);
    }

    public function refunds(): View
    {
        return view('disputes.refunds');
    }
}
