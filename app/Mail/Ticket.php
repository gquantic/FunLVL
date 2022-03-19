<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Ticket extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $answer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Models\Ticket $ticket, $answer)
    {
        $this->ticket = $ticket;
        $this->answer = $answer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.ticket');
    }
}
