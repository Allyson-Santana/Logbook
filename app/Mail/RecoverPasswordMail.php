<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoverPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     private $CodResetPassword;

    public function __construct($passwordRand)
    {
        $this->CodResetPassword = $passwordRand;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $CodResetPassword = $this->CodResetPassword;
        return $this->subject('Recuperação de senha - Diario De Bordo.')
                    ->view('mail.reset', compact('CodResetPassword'));
    }

}
