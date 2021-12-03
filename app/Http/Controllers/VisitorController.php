<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Facades\DB;
use App\Models\OptAlternatif;

class VisitorController extends Controller
{
    public function data_mobil()
    {
        return view('visitor.data_mobil');
    }

    public function detail_data_mobil($id)
    {
        $alternatif = Alternatif::find($id);
        $opt_alternatif = $alternatif->opt_alternatifs;
        return view('visitor.detail_data_mobil')->with('alternatif', $alternatif)->with('opt_alternatif', $opt_alternatif);
    }

    public function datapenilaian(Request $request)
    {
        $mobil        = Alternatif::orderBy('id', 'asc')->get();
        $kriteria     = Kriteria::orderBy('jenis_kriteria_id', 'asc')->get();
        $sub_kriteria = SubKriteria::orderBy('nama', 'asc')->get();
        if ($request !== null) {
            $request = $request;
        } else {
            $request = null;
        }
        return view('visitor.data_penilaian')->with('kriteria', $kriteria)->with('sub_kriteria', $sub_kriteria)->with('mobil', $mobil)->with('request', $request);
    }

    public function profilematchingvisitor(Request $request)
    {
        $mobil          = Alternatif::orderBy('id', 'asc')->get();
        $kriteria       = Kriteria::orderBy('jenis_kriteria_id', 'asc')->get();
        $sub_kriteria   = SubKriteria::orderBy('nama', 'asc')->get();
        $jenis_kriteria = DB::select("select k.id as id_kriteria ,jk.nama as nama_jenis from kriteria k LEFT JOIN jenis_kriterias jk ON jk.id = k.jenis_kriteria_id order by k.id");
        $opt_alternatifs = OptAlternatif::orderBy('alternatif_id', 'asc')->get();
        if ($request !== null) {
            $request = $request;
        } else {
            $request = null;
        }
        return view('visitor.penilaian.result')->with('kriteria', $kriteria)
                                                 ->with('sub_kriteria', $sub_kriteria)
                                                 ->with('mobil', $mobil)
                                                 ->with('jenis_kriteria', $jenis_kriteria)
                                                 ->with('opt_alternatifs', $opt_alternatifs)
                                                 ->with('request', $request);
    }
}
