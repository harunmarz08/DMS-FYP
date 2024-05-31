<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{

    public function markAsRead($id)
    {
        Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
        // Auth::user()->unreadNotifications->where('id', $id)->first()->delete();
        return redirect()->back()->with('status', 'notifications-cleared');
    }

    public function markAsUnread($id)
    {
        Auth::user()->notifications->where('id', $id)->markAsUnread();

        return redirect()->back()->with('status', 'notifications-uncleared');
    }
}
