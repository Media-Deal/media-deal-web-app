<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaOrganization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'email',
        'nin_details',
        'staff_id',
        'position',
        'media_type',

        // TV fields
        'tv_type',
        'tv_name',
        'tv_logo',
        'tv_main_studio_location',
        'tv_channel_location',
        'tv_content_focus',
        'tv_content_focus_other',
        'tv_peak_viewing_times',
        'tv_youtube',
        'tv_website',
        'tv_streaming_url',
        'tv_advert_rate',
        'tv_facebook',
        'tv_twitter',
        'tv_instagram',
        'tv_linkedin',
        'tv_tiktok',
        'tv_other',
        'tv_email',
        'tv_phone',
        'tv_contact_person',

        // Radio fields
        'radio_type',
        'radio_name',
        'radio_logo',
        'radio_frequency',
        'radio_station_location',
        'radio_content_focus',
        'radio_youtube',
        'radio_facebook',
        'radio_instagram',
        'radio_twitter',
        'radio_linkedin',
        'radio_tiktok',
        'radio_other',
        'radio_email',
        'radio_phone',
        'radio_contact_person',

        // Internet fields
        'internet_type',
        'internet_name',
        'internet_logo',
        'internet_channel_location',
        'internet_content_focus',
        'internet_target_audience',
        'internet_broadcast_duration',
        'internet_often_post',
        'internet_youtube',
        'internet_website',
        'internet_streaming_url',
        'internet_advert_rate',
        'internet_facebook',
        'internet_twitter',
        'internet_instagram',
        'internet_linkedin',
        'internet_tiktok',
        'internet_other',
        'internet_email',
        'internet_phone',
        'internet_contact_person',
    ];

    protected $casts = [
        'tv_channel_location' => 'array',
        'radio_content_focus' => 'array',
        'internet_channel_location' => 'array',
    ];

    // Mutators for peak viewing times
    public function setTvPeakViewingTimesAttribute($value)
    {
        $this->attributes['tv_peak_viewing_times'] = json_encode($value);
    }

    public function getTvPeakViewingTimesAttribute($value)
    {
        return json_decode($value);
    }

    // Define the relationship to AdPlacement
    public function adPlacements()
    {
        return $this->hasMany(AdPlacement::class);
    }

    public function compliances()
    {
        return $this->hasMany(Compliance::class, 'media_id');
    }
}
