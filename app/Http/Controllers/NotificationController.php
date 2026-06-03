<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(): View
    {
        return view('notifications.index');
    }

    public function send(): View
    {
        return view('notifications.send');
    }

    public function history(): View
    {
        return view('notifications.history');
    }
}
