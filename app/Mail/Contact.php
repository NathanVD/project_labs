<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Message_Confirmation_Mail;
use App\Message;

class contact extends Mailable
{
    use Queueable, SerializesModels;

    public $message_model;
    public $sent_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $sent_message)
    {
        $this->message_model = Message_Confirmation_Mail::first();
        $this->sent_message = $sent_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.emails.contact')->subject("Confirmation : ".$this->sent_message->subject);
    }
}
