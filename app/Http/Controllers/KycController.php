<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class KycController extends Controller
{
    public function operations(): View
    {
        return view('kyc.operations');
    }

    public function show(string $merchant): View
    {
        return view('kyc.show', ['merchant' => ucfirst($merchant)]);
    }
}
