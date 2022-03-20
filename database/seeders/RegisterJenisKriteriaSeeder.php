<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JenisKriteria;

class RegisterJenisKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::orderBy('id', 'desc')->first()->id;

        $data = new JenisKriteria();
        $data->nama = 'Core Factor (CF)';
        $data->nilai = 0.6;
        $data->user_id = $user_id;
        $data->save();

        $data = new JenisKriteria();
        $data->nama = 'Secondary Factor (SF)';
        $data->nilai = 0.4;
        $data->user_id = $user_id;
        $data->save();
    }
}
