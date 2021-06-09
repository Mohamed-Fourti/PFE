<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        return auth()->user()->unreadnotifications()->limit(5)->get()->toArray();
    }
}
