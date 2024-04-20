<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create([
            "name" => "district-1",
            "city_id" => 1,
        ]);
        District::create([
            "name" => "district-1",
            "city_id" => 2,
        ]);
        District::create([
            "name" => "district-1",
            "city_id" => 3,
        ]);
        District::create([
            "name" => "district-1",
            "city_id" => 4,
        ]);
    }
}
