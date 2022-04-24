<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Selisih;
use Illuminate\Support\Facades\DB;

class UpdateSelisihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count_data = Selisih::count();
        if($count_data >= 1) {
            DB::table('selisih')->delete();
        }
        $users = User::all();
        foreach($users as $u) {
            if(isset($u->selisihs)) {
                $data = new Selisih();
                $data->bobot = 13;
                $data->nilai = 0;
                $data->keterangan = 'Kriteria sesuai dengan yang di butuhkan';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 12;
                $data->nilai = 1;
                $data->keterangan = 'Kriteria kelebihan  1 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 11;
                $data->nilai = -1;
                $data->keterangan = 'Kriteria kekurangan  1 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 10;
                $data->nilai = 2;
                $data->keterangan = 'Kriteria kelebihan 2 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 9;
                $data->nilai = -2;
                $data->keterangan = 'Kriteria kekurangan  2 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 8;
                $data->nilai = 3;
                $data->keterangan = 'Kriteria kelebihan 3 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 7;
                $data->nilai = -3;
                $data->keterangan = 'Kriteria kekurangan  3 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 6;
                $data->nilai = 4;
                $data->keterangan = 'Kriteria kelebihan  4 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 5;
                $data->nilai = -4;
                $data->keterangan = 'Kriteria kekurangan  4 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 4;
                $data->nilai = 5;
                $data->keterangan = 'Kriteria kelebihan 5 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 3;
                $data->nilai = -5;
                $data->keterangan = 'Kriteria kekurangan 5 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 2;
                $data->nilai = 6;
                $data->keterangan = 'Kriteria kelebihan 6 tingkat/level';
                $data->user_id = $u->id;
                $data->save();

                $data = new Selisih();
                $data->bobot = 1;
                $data->nilai = -6;
                $data->keterangan = 'Kriteria kekurangan 6 tingkat/level';
                $data->user_id = $u->id;
                $data->save();
            }
        }
    }
}
