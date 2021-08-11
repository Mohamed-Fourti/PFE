<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ficheDeVœuxOFNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $dataUser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($dataUser)
    {
        $this->data = $dataUser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([]);
    }
}
