<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('shifts')->truncate();

        $payload = [
            [
                'id' => 1,
                'title' => '9amTo6pm',
                'checkin' => '09:00:00',
                'checkout' => '18:00:00',
                'total_working_hours' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => '12pmTo9pm',
                'checkin' => '12:00:00',
                'checkout' => '21:00:00',
                'total_working_hours' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'title' => '3pmTo12pm',
                'checkin' => '03:00:00',
                'checkout' => '00:00:00',
                'total_working_hours' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'title' => '4pmTo1am',
                'checkin' => '16:00:00',
                'checkout' => '01:00:00',
                'total_working_hours' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'title' => '9pmTo6am',
                'checkin' => '21:00:00',
                'checkout' => '06:00:00',
                'total_working_hours' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('shifts')->insert($payload);
        Schema::enableForeignKeyConstraints();
    }
}