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
        Schema::table('media_organizations', function (Blueprint $table) {
            $table->string('radio_target_audience')->nullable(); 
            $table->string('radio_content_focus_other')->nullable();
            $table->string('radio_advert_rate')->nullable();
            $table->string('radio_peak_viewing_times')->nullable();
            $table->string('radio_streaming_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media_organizations', function (Blueprint $table) {
            $table->dropColumn([
                'radio_target_audience',
                'radio_content_focus_other',
                'radio_peak_viewing_times',
                'radio_streaming_url',
            ]);
        });
    }
};
