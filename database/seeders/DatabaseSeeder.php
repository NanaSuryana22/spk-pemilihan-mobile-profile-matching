<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(JenisKriteriaSeeder::class);
        $this->call(SelisihSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
