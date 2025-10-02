<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertiserPaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'advertiser_id',
        'media_id',
        'transaction_ref',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array', // Automatically cast 'meta' to and from an array
    ];


     // Payment history belongs to an Advertiser
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class, 'advertiser_id', 'id');
    }

    // Payment history belongs to a Media Organization
    public function mediaOrganization()
    {
        return $this->belongsTo(MediaOrganization::class, 'media_id', 'id');
    }
}
