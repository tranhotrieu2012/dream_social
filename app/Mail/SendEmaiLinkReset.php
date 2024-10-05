<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendEmaiLinkReset extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;

    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function build()
    {
        $resetLink = url('/password/reset/' . $this->token . '?email=' . urlencode($this->email));
        return $this->view('link_reset_password')
            ->subject('Password Reset Request')
            ->with(['resetLink' => $resetLink]);
    }
}
