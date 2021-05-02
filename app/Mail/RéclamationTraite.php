<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RéclamationTraite extends Mailable
{
    use Queueable, SerializesModels;
    protected $Réclamation;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Réclamation)
    {
        $this->Réclamation=$Réclamation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $Réclamation=$this->Réclamation;

        return $this->view('mail.Réclamationtraite', compact('Réclamation'))->subject('Réclamation traité');

    }
}
