<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WalletController extends Controller
{
    public function index(): View
    {
        return view('wallet.index');
    }

    public function transfer(): View
    {
        return view('wallet.transfer');
    }

    public function addFund(): View
    {
        return view('wallet.add-fund');
    }

    public function list(): View
    {
        return view('wallet.list');
    }
}
