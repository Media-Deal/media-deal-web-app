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
        Schema::create('advertiser_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advertiser_id'); // Ensure this matches the `id` type in `users`
            $table->unsignedBigInteger('media_id'); // Ensure this matches the `id` type in `media`
            $table->string('transaction_ref');
            $table->string('transaction_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3)->default('NGN');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('advertiser_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('media_id')
                ->references('id')
                ->on('media_organizations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertiser_payment_histories');
    }
};
