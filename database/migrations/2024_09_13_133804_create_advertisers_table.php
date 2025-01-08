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
        Schema::create('advertisers', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
=======
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

>>>>>>> c7ca8436e5e826b81c800e9a8d727d2a60edd91c
            $table->string('phone_number', 15);
            $table->string('address', 255);
            $table->date('date_of_birth')->nullable();
            $table->string('company_name', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('store_address', 255)->nullable();
<<<<<<< HEAD
            $table->timestamps(); // created_at, updated_at
=======
            $table->timestamps();
>>>>>>> c7ca8436e5e826b81c800e9a8d727d2a60edd91c
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisers');
    }
};
