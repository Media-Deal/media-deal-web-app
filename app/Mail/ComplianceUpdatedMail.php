<?php

namespace App\Mail;

use App\Models\Compliance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ComplianceUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $adsCompliance;

    /**
     * Create a new message instance.
     */
    public function __construct(Compliance $adsCompliance)
    {
        $this->adsCompliance = $adsCompliance;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Compliance File Update - MediaDeal')
                    ->view('emails.compliance-updated')
                    ->with([
                        'userName' => $this->adsCompliance->user->name,
                        'complianceType' => $this->adsCompliance->compliance_type,
                        'complianceStatus' => $this->adsCompliance->compliance_status == 1 ? 'Approved / Sent' : 'Pending',
                        'complianceFile' => $this->adsCompliance->compliance_file,
                    ]);
    }
}
