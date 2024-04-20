<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Setting::create([
        //     'about_us' => '',
        //     'counter1_name' => 'Subscriptions',
        //     'counter1_count' => '100',
        //     'counter2_name' => 'Cities Office',
        //     'counter2_count' => '50',
        //     'counter3_name' => 'Worker',
        //     'counter3_count' => '200',
        //     'counter4_name' => 'Happy Clients',
        //     'counter4_count' => '500',
        // ]);

        Setting::create([
            'about_us' => '',
            'counter1_name' => 'Subscriptions2',
            'counter1_count' => '200',
            'counter2_name' => 'Cities Office2',
            'counter2_count' => '500',
            'counter3_name' => 'Worker2',
            'counter3_count' => '2002',
            'counter4_name' => 'Happy Clients 22',
            'counter4_count' => '50000',
        ]);
    }
}
