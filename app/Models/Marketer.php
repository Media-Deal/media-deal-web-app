<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'content_focus',
        'content_focus_other',
        'target_audience',
        'Morning',
        'Afternoon',
        'Evening',
        'Late Night',
        'radio_youtube',
        'radio_website',
        'radio_streaming_url',
        'radio_advert_rate',
        'radio_facebook',
        'tv_twitter',
        'radio_instagram',
        'radio_linkedin',
        'radio_tiktok',
        'radio_other',
        'radio_email',
        'radio_phone',
        'radio_contact_person',
        'internet_website',
        'internet_streaming_url',
        'internet_advert_rate',
    ];
}
