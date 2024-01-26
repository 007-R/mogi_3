<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mail_text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_text)
    {
        $this-> mail_text = $mail_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.mail')
            ->from('info@example.com', 'COACH TECH MARKET　事務局')
            ->subject('[COACH TECH MARKET]管理者からのお知らせ')
            ->with('mail_text', $this->mail_text);
    }
}
