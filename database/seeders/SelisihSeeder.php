<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Selisih;

class SelisihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Selisih();
        $data->bobot = 5;
        $data->nilai = 0;
        $data->keterangan = 'Tidak ada selisih (kompetensi sesuai dengan yang dibutuhkan)';
        $data->save();

        $data = new Selisih();
        $data->bobot = 4.5;
        $data->nilai = 1;
        $data->keterangan = 'Kompetensi individu kelebihan 1 tingkat';
        $data->save();

        $data = new Selisih();
        $data->bobot = 4;
        $data->nilai = -1;
        $data->keterangan = 'Kompetensi individu kekurangan 1 tingkat';
        $data->save();

        $data = new Selisih();
        $data->bobot = 3.5;
        $data->nilai = 2;
        $data->keterangan = 'Kompetensi individu kelebihan 2 tingkat';
        $data->save();
        
        $data = new Selisih();
        $data->bobot = 3;
        $data->nilai = -2;
        $data->keterangan = 'Kompetensi individu kekurangan 2 tingkat';
        $data->save();

        $data = new Selisih();
        $data->bobot = 2.5;
        $data->nilai = 3;
        $data->keterangan = 'Kompetensi individu kelebihan 3 tingkat';
        $data->save();

        $data = new Selisih();
        $data->bobot = 2;
        $data->nilai = -3;
        $data->keterangan = 'Kompetensi individu kekurangan 3 tingkat';
        $data->save();

        $data = new Selisih();
        $data->bobot = 1.5;
        $data->nilai = 4;
        $data->keterangan = 'Kompetensi individu kelebihan 4 tingkat';
        $data->save();

        $data = new Selisih();
        $data->bobot = 1;
        $data->nilai = -4;
        $data->keterangan = 'Kompetensi individu kekurangan 4 tingkat';
        $data->save();

    }
}
