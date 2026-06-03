<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(): View
    {
        return view('transactions.index');
    }

    public function show($id): View
    {
        // For the static template, passing an ID
        return view('transactions.show', ['id' => $id]);
    }
}
