<?php

namespace App\Mail;

use App\Models\AdPlacement;
use App\Models\MediaOrganization;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Adsplacement extends Mailable
{
    use Queueable, SerializesModels;

    public $adPlacement;
    public $advertiser;
    public $media;
    public $isAdminCopy;

    /**
     * Create a new message instance.
     */
    public function __construct(AdPlacement $adPlacement, User $advertiser, MediaOrganization $media, $isAdminCopy = false)
    {
        $this->adPlacement = $adPlacement;
        $this->advertiser = $advertiser;
        $this->media = $media;
        $this->isAdminCopy = $isAdminCopy;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->isAdminCopy
            ? 'New Ad Placement Submission - ' . $this->adPlacement->title
            : 'New Ad Placement Request - ' . $this->adPlacement->title;

        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = $this->isAdminCopy
            ? 'emails.ad_placement.admin_notification'
            : 'emails.ad_placement.media_notification';

        return new Content(
            view: $view,
            with: [
                'adPlacement' => $this->adPlacement,
                'advertiser' => $this->advertiser,
                'media' => $this->media,
                'isAdminCopy' => $this->isAdminCopy,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
