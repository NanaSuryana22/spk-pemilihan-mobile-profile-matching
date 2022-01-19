<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alternatif;
use App\Models\OptAlternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_1 = new Alternatif();
        $data_1->nama = 'Hilux D Cab 2.4 V (4x4) DSL A/T';
        $data_1->image = 'img/Hilux_D_Cab.png';
        $data_1->desc = 'Hilux D Cab 2.4 V (4x4) DSL A/T adalah merk atau seri mobil dari merk toyota dengan kategori pickup dan jenis transmisi otomatis menggunakan bahan bakar solar';
        $data_1->save();

        $kriterias = Kriteria::all();
        foreach($kriterias as $k) {
            if($k->nama == 'Merk Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Toyota')->first()->id;
            } elseif($k->nama == 'Kategori Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->first()->id;
            } elseif($k->nama == 'Harga') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 300 Juta')->first()->id;
            } elseif($k->nama == 'Jenis Transmisi') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Otomatis')->first()->id;
            } elseif($k->nama == 'Jenis BBM') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Solar')->first()->id;
            }

            $child_data = new OptAlternatif();
            $child_data->alternatif_id = $data_1->id;
            $child_data->kriteria_id = $k->id;
            $child_data->sub_kriteria_id = $sub_kriteria_id;
            $child_data->save();
        }

        $data_2 = new Alternatif();
        $data_2->nama = 'TritonULTIMATE AT Double Cab 4WD';
        $data_2->image = 'img/triton.jpg';
        $data_2->desc = 'TritonULTIMATE AT Double Cab 4WD adalah merk atau seri mobil dari merk daihatsu dengan kategori pickup dan jenis transmisi otomatis menggunakan bahan bakar bensin';
        $data_2->save();

        $kriterias = Kriteria::all();
        foreach($kriterias as $k) {
            if($k->nama == 'Merk Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Daihatsu')->first()->id;
            } elseif($k->nama == 'Kategori Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->first()->id;
            } elseif($k->nama == 'Harga') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 300 Juta')->first()->id;
            } elseif($k->nama == 'Jenis Transmisi') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Otomatis')->first()->id;
            } elseif($k->nama == 'Jenis BBM') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Bensin')->first()->id;
            }

            $child_data = new OptAlternatif();
            $child_data->alternatif_id = $data_2->id;
            $child_data->kriteria_id = $k->id;
            $child_data->sub_kriteria_id = $sub_kriteria_id;
            $child_data->save();
        }

        $data_3 = new Alternatif();
        $data_3->nama = 'Gran Max PU1.3 3W FH';
        $data_3->image = 'img/grand-max.jpg';
        $data_3->desc = 'Gran Max PU1.3 3W FH adalah merk atau seri mobil dari merk Honda dengan kategori pickup dan jenis transmisi manual menggunakan bahan bakar bensin';
        $data_3->save();

        $kriterias = Kriteria::all();
        foreach($kriterias as $k) {
            if($k->nama == 'Merk Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Honda')->first()->id;
            } elseif($k->nama == 'Kategori Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->first()->id;
            } elseif($k->nama == 'Harga') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 140 Juta')->first()->id;
            } elseif($k->nama == 'Jenis Transmisi') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Manual')->first()->id;
            } elseif($k->nama == 'Jenis BBM') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Bensin')->first()->id;
            }

            $child_data = new OptAlternatif();
            $child_data->alternatif_id = $data_3->id;
            $child_data->kriteria_id = $k->id;
            $child_data->sub_kriteria_id = $sub_kriteria_id;
            $child_data->save();
        }

        $data_4 = new Alternatif();
        $data_4->nama = 'Carry Wide-Deck AC/PS';
        $data_4->image = 'img/carry.jpg';
        $data_4->desc = 'Carry Wide-Deck AC/PS adalah merk atau seri mobil dari merk Mitsubishi dengan kategori pickup dan jenis transmisi manual menggunakan bahan bakar bensin';
        $data_4->save();

        $kriterias = Kriteria::all();
        foreach($kriterias as $k) {
            if($k->nama == 'Merk Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Mitsubishi')->first()->id;
            } elseif($k->nama == 'Kategori Mobil') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Pickup')->first()->id;
            } elseif($k->nama == 'Harga') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Diatas 150 Juta')->first()->id;
            } elseif($k->nama == 'Jenis Transmisi') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Manual')->first()->id;
            } elseif($k->nama == 'Jenis BBM') {
                $sub_kriteria_id = SubKriteria::where('nama', 'Bensin')->first()->id;
            }

            $child_data = new OptAlternatif();
            $child_data->alternatif_id = $data_4->id;
            $child_data->kriteria_id = $k->id;
            $child_data->sub_kriteria_id = $sub_kriteria_id;
            $child_data->save();
        }
    }
}
