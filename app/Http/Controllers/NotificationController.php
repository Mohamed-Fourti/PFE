<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        return auth()->user()->unreadnotifications()->limit(3)->get()->toArray();
    }
    public function show($id)
    {
        $notification = auth()->user()->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
            if ($notification->type == 'App\Notifications\RéclamationNotification') {
                return redirect()->route('réclamations/{id}/consulter', $notification->data['id']);
            }
            if ($notification->type == 'App\Notifications\TableauAffichageNotification') {
                return redirect()->route('TableauAffichages', $notification->data['id']);
            }

            if ($notification->type == 'App\Notifications\RéclamationTraiteNotification') {
                return redirect()->route('réclamation');
            }
        }
    }
}
