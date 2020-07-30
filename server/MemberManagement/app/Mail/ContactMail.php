<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $contact_content;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_content)
    {
        $this->contact_content = $contact_content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hoge@hoge.com')
            ->subject('お問い合わせテスト')
            ->view('contact.mail')
            ->with('contact_content', $this->contact_content);
    }
}
