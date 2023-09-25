<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('schedules')->truncate();

        $payload = [
            [
                'id' => 1,
                'employee_id' => 1,
                'location_id' => 1,
                'shift_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'employee_id' => 2,
                'location_id' => 1,
                'shift_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'employee_id' => 3,
                'location_id' => 2,
                'shift_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'employee_id' => 4,
                'location_id' => 2,
                'shift_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'employee_id' => 5,
                'location_id' => 1,
                'shift_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('schedules')->insert($payload);
        Schema::enableForeignKeyConstraints();
    }
}
