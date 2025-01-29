<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdPlacement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'media_id',          // Added media_id to fillable
        'title',
        'status',
        'category',
        'type',
        'content_type',
        'upload_file',
        'target_audience',
        'target_location',
        'duration',
        'specify_dates',
    ];

    /**
     * Get the user that owns the ad placement.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the media associated with the ad placement.
     */
    public function media()
    {
        return $this->belongsTo(MediaOrganization::class, 'media_id', 'id'); // Corrected relationship
    }


//     public function mediaOrganization()
// {
//     return $this->belongsTo(MediaOrganization::class, 'media_id', 'id');
// }

    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class); // Corrected relationship
    }

    
    
    /**
     * Optionally, you can define attribute casting if needed.
     *
     * protected $casts = [
     *     'specify_dates' => 'array',
     * ];
     */
}
