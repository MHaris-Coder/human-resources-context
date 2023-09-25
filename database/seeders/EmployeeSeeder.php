<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('employees')->truncate();

        $payload = [
            [
                'id' => 1,
                'employee_id' => 'emp_001',
                'name' => 'Devid',
                'email' => 'devid@yopmail.com',
                'dob' => '1990-01-01',
                'designation' => 'Android Developer',
                'joining_date' => '2010-01-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'employee_id' => 'emp_002',
                'name' => 'John',
                'email' => 'john@yopmail.com',
                'dob' => '1990-01-01',
                'designation' => 'Php Developer',
                'joining_date' => '2010-01-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'employee_id' => 'emp_003',
                'name' => 'Richard',
                'email' => 'richard@yopmail.com',
                'dob' => '1990-01-01',
                'designation' => 'Magento Developer',
                'joining_date' => '2010-01-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'employee_id' => 'emp_004',
                'name' => 'Mike',
                'email' => 'mike@yopmail.com',
                'dob' => '1990-01-01',
                'designation' => 'Django Developer',
                'joining_date' => '2010-01-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'employee_id' => 'emp_005',
                'name' => 'Daniel',
                'email' => 'daniel@yopmail.com',
                'dob' => '1990-01-01',
                'designation' => 'Php Developer',
                'joining_date' => '2010-01-01',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('employees')->insert($payload);
        Schema::enableForeignKeyConstraints();
    }
}