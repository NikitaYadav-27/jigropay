<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CommissionController extends Controller
{
    public function index(): View
    {
        return view('commission.index');
    }

    public function slabs(): View
    {
        return view('commission.slabs');
    }
}
