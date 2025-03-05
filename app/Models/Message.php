<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory; 

    protected $fillable = [
        'advertiser_id',
        'media_organization_id',
        'sender_type',
        'message',
        'reply',
        'replied_at',
    ];

    /**
     * Relationship with Advertiser
     */
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class);
    }

    /**
     * Relationship with MediaOrganization
     */
    public function mediaOrganization()
    {
        return $this->belongsTo(MediaOrganization::class);
    }

    /**
     * Check if the sender is an advertiser
     */
    public function isAdvertiserSender()
    {
        return $this->sender_type === 'advertiser';
    }

    /**
     * Check if the sender is a media organization
     */
    public function isMediaOrganizationSender()
    {
        return $this->sender_type === 'media_organization';
    }
}
