<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            "name" => "aga",
        ]);
        City::create([
            "name" => "metgamr",
        ]);
        City::create([
            "name" => "mansoura",
        ]);
        City::create([
            "name" => "banha",
        ]);
    }
}
