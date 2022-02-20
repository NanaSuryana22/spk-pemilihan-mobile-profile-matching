<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UpdateKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kriteria')->delete();   
        $users = User::all();
        foreach($users as $u) {
            if(isset($u->kriterias)) {
                $core_factor = DB::table('jenis_kriterias')->where('nama', 'Core Factor (CF)')->first();
                $seconday_factor = DB::table('jenis_kriterias')->where('nama', 'Secondary Factor (SF)')->first();

                $data = new Kriteria();
                $data->nama = 'Merk Mobil';
                $data->jenis_kriteria_id = $core_factor->id;
                $data->user_id = $u->id;
                $data->save();

                $data = new Kriteria();
                $data->nama = 'Kategori Mobil';
                $data->jenis_kriteria_id = $core_factor->id;
                $data->user_id = $u->id;
                $data->save();

                $data = new Kriteria();
                $data->nama = 'Harga';
                $data->jenis_kriteria_id = $core_factor->id;
                $data->user_id = $u->id;
                $data->save();

                $data = new Kriteria();
                $data->nama = 'Jenis Transmisi';
                $data->jenis_kriteria_id = $seconday_factor->id;
                $data->user_id = $u->id;
                $data->save();

                $data = new Kriteria();
                $data->nama = 'Jenis BBM';
                $data->jenis_kriteria_id = $seconday_factor->id;
                $data->user_id = $u->id;
                $data->save();
            }
        }
    }
}
