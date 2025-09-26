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
        Schema::table('compliances', function (Blueprint $table) {
            // Add new columns for storing compliance file info
            $table->string('compliance_file')->nullable()->after('id');
            $table->string('compliance_file_public_id')->nullable()->after('compliance_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compliances', function (Blueprint $table) {
            $table->dropColumn(['compliance_file', 'compliance_file_public_id']);
        });
    }
};
