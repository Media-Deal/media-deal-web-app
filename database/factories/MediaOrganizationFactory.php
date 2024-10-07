<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaOrganization>
 */
class MediaOrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Assuming a User model
            'fullname' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'nin_details' => $this->faker->numerify('##########'),
            'staff_id' => $this->faker->randomNumber(6),
            'position' => $this->faker->jobTitle,
            'media_type' => $this->faker->randomElement(['TV', 'Radio', 'Internet']),

            // TV fields
            'tv_type' => $this->faker->randomElement(['National', 'Local']),
            'tv_name' => $this->faker->company,
            'tv_logo' => 'uploads/branding/' . $this->faker->word . '_logo.png',
            'tv_main_studio_location' => $this->faker->address,
            'tv_channel_location' => json_encode([$this->faker->city, $this->faker->city]),
            'tv_content_focus' => $this->faker->word,
            'tv_content_focus_other' => $this->faker->word,
            'tv_peak_viewing_times' => ['morning', 'evening'],
            'tv_youtube' => $this->faker->url,
            'tv_website' => $this->faker->url,
            'tv_streaming_url' => $this->faker->url,
            'tv_advert_rate' => $this->faker->randomFloat(2, 1000, 10000),
            'tv_facebook' => $this->faker->url,
            'tv_twitter' => $this->faker->url,
            'tv_instagram' => $this->faker->url,
            'tv_linkedin' => $this->faker->url,
            'tv_tiktok' => $this->faker->url,
            'tv_other' => $this->faker->url,
            'tv_email' => $this->faker->safeEmail,
            'tv_phone' => $this->faker->phoneNumber,
            'tv_contact_person' => $this->faker->name,

            // Radio fields
            'radio_type' => $this->faker->randomElement(['AM', 'FM']),
            'radio_name' => $this->faker->company,
            'radio_logo' => 'uploads/branding/' . $this->faker->word . '_logo.png',
            'radio_frequency' => $this->faker->numerify('###.#'),
            'radio_station_location' => $this->faker->address,
            'radio_content_focus' => json_encode([$this->faker->word, $this->faker->word]),
            'radio_youtube' => $this->faker->url,
            'radio_facebook' => $this->faker->url,
            'radio_instagram' => $this->faker->url,
            'radio_twitter' => $this->faker->url,
            'radio_linkedin' => $this->faker->url,
            'radio_tiktok' => $this->faker->url,
            'radio_other' => $this->faker->url,
            'radio_email' => $this->faker->safeEmail,
            'radio_phone' => $this->faker->phoneNumber,
            'radio_contact_person' => $this->faker->name,

            // Internet fields
            'internet_type' => $this->faker->word,
            'internet_name' => $this->faker->company,
            'internet_logo' => $this->faker->image('public/storage/images', 640, 480, null, false),
            'internet_channel_location' => json_encode([$this->faker->city, $this->faker->city]),
            'internet_content_focus' => $this->faker->word,
            'internet_target_audience' => $this->faker->word,
            'internet_broadcast_duration' => $this->faker->randomDigitNotNull,
            'internet_often_post' => $this->faker->randomDigitNotNull,
            'internet_youtube' => $this->faker->url,
            'internet_website' => $this->faker->url,
            'internet_streaming_url' => $this->faker->url,
            'internet_advert_rate' => $this->faker->randomFloat(2, 1000, 10000),
            'internet_facebook' => $this->faker->url,
            'internet_twitter' => $this->faker->url,
            'internet_instagram' => $this->faker->url,
            'internet_linkedin' => $this->faker->url,
            'internet_tiktok' => $this->faker->url,
            'internet_other' => $this->faker->url,
            'internet_email' => $this->faker->safeEmail,
            'internet_phone' => $this->faker->phoneNumber,
            'internet_contact_person' => $this->faker->name,
        ];
    }
}
