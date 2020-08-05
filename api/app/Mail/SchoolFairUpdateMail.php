<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SchoolFairUpdateMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $content;
    public $mail_content;
    public function __construct($content,$mail_content)
    {
        $this->content = $content;
        $this->mail_content = $mail_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->from(env('MAIL_USERNAME'))->view('emails.fair.update');

        return $this->subject("School Fair updated!")->view('emails.fair.update');
    }
}
