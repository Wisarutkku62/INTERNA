<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('internship_positions')->insert([
            [
            'id' => '1',
            'company_id' => '1',
            'position_name' => 'Network Engineer',
            'position_description' => 'Route / Fix / Cable',
            'position_category' => 'IT',
            'position_capacity' => 2,
            'position_allowance' => 19000,
            'position_workdate' => 'Monday - Friday',
            'position_worktime' => '10:00-18:00',
            'position_worktype' => 'Hybrid',
            'position_interview_type' => 'Online',
            'created_at' => '2026-08-10 09:15:00',
            'updated_at' => '2026-08-10 09:15:00'

            ],
            [
            'id' => '2',
            'company_id' => '2',
            'position_name' => 'IT Project Manager',
            'position_description' => 'Consult / Management',
            'position_category' => 'IT',
            'position_capacity' => 1,
            'position_allowance' => 35000,
            'position_workdate' => 'Monday - Friday',
            'position_worktime' => '10:00-18:00',
            'position_worktype' => 'Onsite',
            'position_interview_type' => 'Onsite',
            'created_at' => '2026-08-10 09:15:00',
            'updated_at' => '2026-08-10 09:15:00'

            ]
            ]);
    }
}
