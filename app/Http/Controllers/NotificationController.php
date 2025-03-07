<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    
    public function index()
    {
        $notifications = Auth::user()->unreadNotifications;

        // Marquer les notifications comme lues lorsqu'elles sont affichées
        Auth::user()->unreadNotifications->markAsRead();

        return view('notifications.index', compact('notifications'));
    }
}
