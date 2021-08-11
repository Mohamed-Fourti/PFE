<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return View
     */
    public function index()
    {
        $NewUsers = DB::table('notifications')->where('type', 'App\Notifications\NewUserNotification')->where('read_at', '=', null)->count();
        $NewFV = DB::table('notifications')->where('type', 'App\Notifications\ficheDeVœuxNotification')->where('read_at', '=', null)->count();
        $NewRat = DB::table('notifications')->where('type', 'App\Notifications\RattrapageNotification')->where('read_at', '=', null)->count();
        $NewCont = DB::table('notifications')->where('type', 'App\Notifications\ContactNotification')->where('read_at', '=', null)->count();
        $Newcoll = DB::table('notifications')->where('type', 'App\Notifications\ColloqueScientifiqueNotification')->where('read_at', '=', null)->count();


        return view('AdminPanel.index', compact('NewUsers', 'NewFV', 'NewRat', 'NewCont', 'Newcoll'));
    }
    public function loginAdmin()
    {
        return view('auth.loginAdmin');
    }
    public function MarkNotificationAsRead($type)
    {
        // dd($type);
        $Notifications = DB::table('notifications')->where('type', $type)->get();
        $notification = auth()->user()->notifications()->where('type', $type)->get();

        foreach ($notification as $Not) {
            $Not->markAsRead();
        }
        return redirect()->back();
    }
}
