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
        Schema::create('ad_placements', function (Blueprint $table) {
            $table->id();
            // Create a foreign key to the users table with cascading delete
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Create a foreign key to the media_organizations table with cascading delete
            $table->foreignId('media_id')->constrained('media_organizations')->onDelete('cascade');
            // Ad title, category, and type
            $table->string('title');
            $table->string('category');
            $table->string('type');
            // Specify whether content is required, using a clearer enum
            $table->enum('content_type', ['Yes', 'No', 'Not Required']);
            // Allow an optional file upload for the ad
            $table->string('upload_file')->nullable();
            // Target audience and location
            $table->string('target_audience');
            $table->string('target_location');
            // Duration of the ad placement
            $table->string('duration');
            // Optionally specify exact dates for the ad placement
            $table->string('specify_dates')->nullable();
            // Automatically managed created_at and updated_at timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_placements');
    }
};
