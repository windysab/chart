<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ChartDataSeeder;

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

        // Call other seeders here
        // $this->call(UserSeeder::class);
        $this->call(ChartDataSeeder::class);
        $this->call(RealisasiSeeder::class);
        $this->call(Dipa01DataSeeder::class);
    }
}
