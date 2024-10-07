<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('nin_details');
            $table->string('staff_id'); // Staff ID file path
            $table->string('position');
            $table->enum('media_type', ['tv', 'radio', 'internet']);

            // TV fields
            $table->string('tv_type')->nullable();
            $table->string('tv_name')->nullable();
            $table->string('tv_logo')->nullable();
            $table->string('tv_main_studio_location')->nullable();
            $table->json('tv_channel_location')->nullable();
            $table->string('tv_content_focus')->nullable();
            $table->string('tv_content_focus_other')->nullable();
            $table->string('tv_peak_viewing_times')->nullable();
            $table->string('tv_youtube')->nullable();
            $table->string('tv_website')->nullable();
            $table->string('tv_streaming_url')->nullable();
            $table->string('tv_advert_rate')->nullable();
            $table->string('tv_facebook')->nullable();
            $table->string('tv_twitter')->nullable();
            $table->string('tv_instagram')->nullable();
            $table->string('tv_linkedin')->nullable();
            $table->string('tv_tiktok')->nullable();
            $table->string('tv_other')->nullable();
            $table->string('tv_email')->nullable();
            $table->string('tv_phone')->nullable();
            $table->string('tv_contact_person')->nullable();


            // Radio fields
            $table->string('radio_type')->nullable();
            $table->string('radio_name')->nullable();
            $table->string('radio_logo')->nullable();
            $table->string('radio_frequency')->nullable();
            $table->string('radio_station_location')->nullable();
            $table->json('radio_content_focus')->nullable();
            $table->string('radio_youtube')->nullable();
            $table->string('radio_facebook')->nullable();
            $table->string('radio_instagram')->nullable();
            $table->string('radio_twitter')->nullable();
            $table->string('radio_linkedin')->nullable();
            $table->string('radio_tiktok')->nullable();
            $table->string('radio_other')->nullable();
            $table->string('radio_email')->nullable();
            $table->string('radio_phone')->nullable();
            $table->string('radio_contact_person')->nullable();

            // Internet fields
            $table->string('internet_type')->nullable();
            $table->string('internet_name')->nullable();
            $table->string('internet_logo')->nullable();
            $table->json('internet_channel_location')->nullable();
            $table->string('internet_content_focus')->nullable();
            $table->string('internet_target_audience')->nullable();
            $table->string('internet_broadcast_duration')->nullable();
            $table->string('internet_often_post')->nullable();
            $table->string('internet_youtube')->nullable();
            $table->string('internet_website')->nullable();
            $table->string('internet_streaming_url')->nullable();
            $table->string('internet_advert_rate')->nullable();
            $table->string('internet_facebook')->nullable();
            $table->string('internet_twitter')->nullable();
            $table->string('internet_instagram')->nullable();
            $table->string('internet_linkedin')->nullable();
            $table->string('internet_tiktok')->nullable();
            $table->string('internet_other')->nullable();
            $table->string('internet_email')->nullable();
            $table->string('internet_phone')->nullable();
            $table->string('internet_contact_person')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_organizations');
    }
};
