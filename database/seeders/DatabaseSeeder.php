<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $path = base_path() . "/database/seeders";

        $brands = file_get_contents($path . "/insert_into_brands.sql");
        $vehicles = file_get_contents($path . "/insert_into_vehicles.sql");

        DB::unprepared($brands);
        DB::unprepared($vehicles);


    }
}
