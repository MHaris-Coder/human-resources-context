<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('locations')->truncate();

        $payload = [
            [
                'id' => 1,
                'title' => 'Branch A',
                'country' => 'US',
                'state' => 'Alaska',
                'city' => 'Anchorage',
                'zipcode' => '99501',
                'address' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'title' => 'Branch B',
                'country' => 'UK',
                'state' => 'England',
                'city' => 'Birmingham',
                'zipcode' => '35005',
                'address' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('locations')->insert($payload);
        Schema::enableForeignKeyConstraints();
    }
}