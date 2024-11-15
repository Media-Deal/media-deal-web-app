<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compliance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'media_id',
        'user_id', // Added user_id to fillable
        'compliance_status',
        'compliance_type',
    ];

    /**
     * Get the media organization associated with the compliance.
     */
    public function media()
    {
        return $this->belongsTo(MediaOrganization::class, 'media_id');
    }

    /**
     * Get the user who submitted the compliance.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
