<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Blog_Post_Mail;
use App\Article;

class Blog_Post extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $message_model;
    public $article;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->message_model = Blog_Post_Mail::first();
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('admin.emails.blog_post')->subject("Labs - Nouvel article : ".$this->article->title);
    }
}
