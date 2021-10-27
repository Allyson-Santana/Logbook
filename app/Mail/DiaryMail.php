<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

use Barryvdh\DomPDF\PDF;

class DiaryMail extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $diary; 

    public function __construct($diaryQuerys)
    {
        $this->diary = $diaryQuerys;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $diary = $this->diary;
        return $this->markdown('mail.diaryPdf', compact('diary'));
    }
}
