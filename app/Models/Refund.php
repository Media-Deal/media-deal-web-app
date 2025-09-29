<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'media',
        'category',
        'status',
        'feedback',
        'refunded',
    ];

    // Cast 'refunded' to boolean
    protected $casts = [
        'refunded' => 'boolean',
    ];

    /**
     * Get the user that owns the refund.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // In App\Models\Refund.php
public function advertiser()
{
    return $this->belongsTo(Advertiser::class, 'advertiser_id');
}

}
