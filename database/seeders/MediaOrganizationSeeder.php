<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MediaOrganization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 media organization records
        MediaOrganization::factory()->count(20)->create();
    }
}
