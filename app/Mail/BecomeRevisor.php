<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use App\Models\User;

class BecomeRevisor extends Mailable
{
    public $user;
    public $messageText;

    public function __construct($user, $messageText)
    {
        $this->user = $user;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('Richiesta per diventare revisore')
            ->view('mail.become-revisor');
    }
}
