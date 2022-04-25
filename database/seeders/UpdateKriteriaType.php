<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JenisKriteria;
use Illuminate\Support\Facades\DB;
class UpdateKriteriaType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count_data = JenisKriteria::count();
        if($count_data >= 1) {
            DB::table('jenis_kriterias')->delete();
        }
        $users = User::all();
        foreach($users as $u) {
            if(isset($u->jenis_kriterias)) {
                $data = new JenisKriteria();
                $data->nama = 'Core Factor (CF)';
                $data->nilai = 0.7;
                $data->user_id = $u->id;
                $data->save();

                $data = new JenisKriteria();
                $data->nama = 'Secondary Factor (SF)';
                $data->nilai = 0.3;
                $data->user_id = $u->id;
                $data->save();
            }
        }
    }
}
