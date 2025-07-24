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
}
