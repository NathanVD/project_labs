<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Message_Confirmation_Mail;

class contact_preview extends Mailable
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
        $this->message_model = Message_Confirmation_Mail::first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.emails.contact_preview');
    }
}
