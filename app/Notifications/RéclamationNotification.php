<?php

namespace App\Notifications;

use App\Models\Réclamation;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RéclamationNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Réclamation $data)
    {
        $this->data = $data;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
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
            'id' => $this->data->id,
            'user_name' => $this->data->User->nom,
            'priorité' => $this->data->priorite,

        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' => [
                'id' => $this->data->id,
                'user_name' => $this->data->User->nom,
                'priorité' => $this->data->priorite,

            ],

        ]);
    }
}
