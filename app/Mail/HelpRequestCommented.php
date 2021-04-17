<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelpRequestCommented extends Mailable
{
    use Queueable, SerializesModels;

    private $help_request;
    private $answer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($help_request, $answer)
    {
        $this->help_request = $help_request;
        $this->answer = $answer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.help_request_commented', ['help_request' => $this->help_request, 'answer' => $this->answer]);
    }
}
