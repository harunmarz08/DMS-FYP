<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function markAsRead()
    {
        Auth::user()->notifications->markAsRead();

        return redirect()->back()->with('status', 'notifications-cleared');
    }

    public function markAsUnead()
    {
        Auth::user()->notifications->markAsUnread();

        return redirect()->back()->with('status', 'notifications-uncleared');
    }

}
