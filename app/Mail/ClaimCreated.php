<?php

namespace App\Mail;

use App\Models\Claim;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClaimCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $claim;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->claim->user_email;
        return $this->from($email)
                ->markdown('mail.claim-created')
                ->with([
                    'user_email' => $this->claim->user_email,
                    'message' => $this->claim->message,
                    'created_at' => $this->claim->created_at,
                ]);
    }
}
