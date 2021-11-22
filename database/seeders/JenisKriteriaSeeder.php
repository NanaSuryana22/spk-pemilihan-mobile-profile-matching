<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JenisKriteria;

class JenisKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new JenisKriteria();
        $data->nama = 'Core Factor (CF)';
        $data->nilai = 0.6;
        $data->save();

        $data = new JenisKriteria();
        $data->nama = 'Secondary Factor (SF)';
        $data->nilai = 0.4;
        $data->save();
    }
}
