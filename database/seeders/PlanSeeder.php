<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('plans')->truncate();

        $plans = [
            ['title' => 'Basic', 'price' => 49999, 'duration' => 30, 'resolution' => '480', 'max_devices' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Standard', 'price' => 89999, 'duration' => 60, 'resolution' => '720', 'max_devices' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Premium', 'price' => 129999, 'duration' => 90, 'resolution' => '1080', 'max_devices' => 15, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('plans')->insert($plans);

        Schema::enableForeignKeyConstraints();
    }
}
