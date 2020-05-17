<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Newsletter_Mail;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    public $message_model;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message_model = Newsletter_Mail::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.emails.newsletter');
    }
}
