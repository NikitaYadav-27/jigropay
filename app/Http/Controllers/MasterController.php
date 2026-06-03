<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class MasterController extends Controller
{
    public function offers(): View
    {
        return view('masters.offers');
    }

    public function offersCreate(): View
    {
        return view('masters.offers-create');
    }

    public function auditLogs(): View
    {
        return view('masters.audit');
    }

    public function commission(): View
    {
        return view('masters.commission');
    }

    public function commissionCreate(): View
    {
        return view('masters.commission-create');
    }
}
