<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class TeamInvite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Invitation $invitation)
    {
        //
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->markdown('mail.team-invite', [
            'acceptUrl' => URL::signedRoute('invite', ['invitation' => $this->invitation]),
        ]);
    }
}
