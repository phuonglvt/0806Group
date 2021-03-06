<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotifyCreateIdea extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $data;
    /**
     * Create a new data instance.
     *
     * @return void
     */

    public function __construct($user, $data)
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(ENV('MAIL_USERNAME'))
            ->view('emails.mail-notify-create-idea')
            ->subject('Notification email create new idea');
    }
}