<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\AdPlacement;

class AdStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $adPlacement;

    /**
     * Create a new message instance.
     */
    public function __construct(AdPlacement $adPlacement)
    {
        $this->adPlacement = $adPlacement;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Ad Status Has Been Updated')
                    ->view('emails.ad_status_updated');
    }
}
