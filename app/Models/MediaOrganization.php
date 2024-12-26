<?php

namespace App\Models;

use App\Models\User;
use App\Models\MediaOrganization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'tv_channel_location_other',
        'tv_content_focus',
        'tv_content_focus_other',
        'tv_target_audience',
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
        'radio_content_focus_other',
        'radio_target_audience',
        'radio_peak_viewing_times',
        'radio_youtube',
        'radio_website',
        'radio_streaming_url',
        'radio_advert_rate',
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
        'all_internet_youtube',
        'internet_channel_location',
        'internet_channel_location_other',
        'internet_content_focus',
        'internet_content_focus_other',
        'internet_target_audience',
        'internet_broadcast_duration',
        'internet_often_post',
        'internet_youtube',
        'internet_website',
        'internet_streaming_url',
        'internet_advert_rate',
        'internet_facebook',
        'internet_twitch',
        'internet_twitter',
        'internet_instagram',
        'internet_linkedin',
        'internet_tiktok',
        'internet_other',
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

    public function user()
    {
       return $this->belongsTo(User::class, 'user_id','id');
    }
}
