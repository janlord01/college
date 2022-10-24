<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('college_settings')->insert([
            'theme_color'  => '#161E2E',
        ]);

        DB::table('college_school_infos')->insert([
            'school_name'  => 'Dr. P. Ocampo - Davao',
            'ched_no'  => '7777',
            'country'  => 'Philippines',
            'province'  => 'Davao Del Sur',
            'city'  => 'Davao City',
            'barangay'  => 'Barange Toril',
            'zipcode'  => '8000',
            'address'  => 'Toril st.',
            'fb'  => 'https://www.facebook.com/dpocdciofficial',
            'email'  => 'drpocampodvo@gmail.com',
            'phone_no'  => '082-7777777',
            'mobile_no'  => '0912345678',
        ]);

        DB::table('college_academic_settings')->insert([
            'acad_year'  => '2021-2022',
            'status'  => 'Active',
        ]);
    }
}
