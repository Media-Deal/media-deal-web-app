<?php

namespace App\Mail;

use App\Models\Refund;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $refund;

    public function __construct(Refund $refund)
    {
        $this->refund = $refund;
    }

    public function build()
    {
        return $this->subject('Your Refund Request Update')
                    ->view('emails.refund-updated');
    }
}
