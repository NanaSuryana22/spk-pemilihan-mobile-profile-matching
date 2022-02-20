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
        $this->call(UserSeeder::class);
        // $this->call(JenisKriteriaSeeder::class);
        // $this->call(SelisihSeeder::class);
        // $this->call(KriteriaSeeder::class);
        // $this->call(SubKriteriaSeeder::class);
        $this->call(AlternatifSeeder::class);
        $this->call(UpdateKriteriaType::class);
        $this->call(UpdateSelisihSeeder::class);
        $this->call(UpdateKriteriaSeeder::class);
        $this->call(UpdateSubKriteriaSeeder::class);
    }
}
