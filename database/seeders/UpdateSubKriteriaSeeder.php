<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SubKriteria;
use App\Models\User;

class UpdateSubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_kriteria')->delete();   
        $users = User::all();
        foreach($users as $u) {
            if(isset($u->sub_kriterias)) {
                $merk_mobil = DB::table('kriteria')->where('nama', 'Merk Mobil')->first();
                $kategori_mobil = DB::table('kriteria')->where('nama', 'Kategori Mobil')->first();
                $harga = DB::table('kriteria')->where('nama', 'Harga')->first();
                $jenis_transmisi = DB::table('kriteria')->where('nama', 'Jenis Transmisi')->first();
                $jenis_bbm = DB::table('kriteria')->where('nama', 'Jenis BBM')->first();

                $data = new SubKriteria();
                $data->nama = 'Toyota';
                $data->kriteria_id = $merk_mobil->id;
                $data->nilai = 6;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Daihatsu';
                $data->kriteria_id = $merk_mobil->id;
                $data->nilai = 5;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Honda';
                $data->kriteria_id = $merk_mobil->id;
                $data->nilai = 4;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Mitsubishi';
                $data->kriteria_id = $merk_mobil->id;
                $data->nilai = 3;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Suzuki';
                $data->kriteria_id = $merk_mobil->id;
                $data->nilai = 2;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Lainnya';
                $data->kriteria_id = $merk_mobil->id;
                $data->nilai = 1;
                $data->user_id = $u->id;
                $data->save();

                // Seeder Untuk Kategori Mobil
                $data = new SubKriteria();
                $data->nama = 'Wagon/Hatchback';
                $data->kriteria_id = $kategori_mobil->id;
                $data->nilai = 5;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'MPV';
                $data->kriteria_id = $kategori_mobil->id;
                $data->nilai = 4;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Pickup';
                $data->kriteria_id = $kategori_mobil->id;
                $data->nilai = 3;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'SUV';
                $data->kriteria_id = $kategori_mobil->id;
                $data->nilai = 2;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Sedan';
                $data->kriteria_id = $kategori_mobil->id;
                $data->nilai = 1;
                $data->user_id = $u->id;
                $data->save();

                // Seeder untuk harga mobil
                $data = new SubKriteria();
                $data->nama = 'Diatas 300 Juta';
                $data->kriteria_id = $harga->id;
                $data->nilai = 5;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Diatas 180 Juta';
                $data->kriteria_id = $harga->id;
                $data->nilai = 4;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Diatas 150 Juta';
                $data->kriteria_id = $harga->id;
                $data->nilai = 3;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Diatas 140 Juta';
                $data->kriteria_id = $harga->id;
                $data->nilai = 2;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Dibawah 100 Juta';
                $data->kriteria_id = $harga->id;
                $data->nilai = 1;
                $data->user_id = $u->id;
                $data->save();

                // Seeder untuk jenis transmisi
                $data = new SubKriteria();
                $data->nama = 'Otomatis';
                $data->kriteria_id = $jenis_transmisi->id;
                $data->nilai = 2;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Manual';
                $data->kriteria_id = $jenis_transmisi->id;
                $data->nilai = 1;
                $data->user_id = $u->id;
                $data->save();

                // Seeder untuk jenis bbm
                $data = new SubKriteria();
                $data->nama = 'Bensin';
                $data->kriteria_id = $jenis_bbm->id;
                $data->nilai = 2;
                $data->user_id = $u->id;
                $data->save();

                $data = new SubKriteria();
                $data->nama = 'Solar';
                $data->kriteria_id = $jenis_bbm->id;
                $data->nilai = 1;
                $data->user_id = $u->id;
                $data->save();
            }
        }
    }
}
