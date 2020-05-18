<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Message_Confirmation_Mail;
use App\User;

class Register extends Mailable
{
    use Queueable, SerializesModels;

    public $message_model;
    public $new_user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $new_user)
    {
        $this->message_model = Message_Confirmation_Mail::first();
        $this->new_user = $new_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.emails.register')->subject("Confirmation d'inscription ");
    }
}
