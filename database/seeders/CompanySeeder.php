<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
            'id' => '1',
            'user_id' => '1',
            'company_name' => 'AIS',
            'company_description' => 'AIS Telecom',
            'company_address' => 'Sriracha',
            'company_website' => 'www.ais.co.th',
            'contact_name' => 'Jerd',
            'contact_position' => 'HR',
            'contact_phone' => '0957143384',
            'contact_email' => 'ais_contact@gmail.com',
            'created_at' => '2026-08-10 09:15:00',
            'updated_at' => '2026-08-10 09:15:00'

            ],
            [
            'id' => '2',
            'user_id' => '2',
            'company_name' => 'TRUE',
            'company_description' => 'TRUE Telecom',
            'company_address' => 'Korat',
            'company_website' => 'www.true.co.th',
            'contact_name' => 'Jarat',
            'contact_position' => 'HR',
            'contact_phone' => '0874526385',
            'contact_email' => 'true_contact@gmail.com',
            'created_at' => '2026-08-10 09:15:00',
            'updated_at' => '2026-08-10 09:15:00'
            ],
            ]);
    }
}
