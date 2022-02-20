<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JenisKriteria;

class UpdateKriteriaType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach($users as $u) {
            if(isset($u->jenis_kriterias)) {
                $data = new JenisKriteria();
                $data->nama = 'Core Factor (CF)';
                $data->nilai = 0.6;
                $data->user_id = $u->id;
                $data->save();

                $data = new JenisKriteria();
                $data->nama = 'Secondary Factor (SF)';
                $data->nilai = 0.4;
                $data->user_id = $u->id;
                $data->save();
            }
        }
    }
}
