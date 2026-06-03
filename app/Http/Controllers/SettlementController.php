<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SettlementController extends Controller
{
    public function index(): View
    {
        return view('settlement.index');
    }

    public function queue(): View
    {
        return view('settlement.queue');
    }

    public function instant(): View
    {
        return view('settlement.instant');
    }
}
