<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Alternatif;
use App\Models\JenisKriteria;
use App\Models\OptAlternatif;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mobil        = Alternatif::orderBy('id', 'asc')->get();
        $kriteria     = Kriteria::orderBy('jenis_kriteria_id', 'asc')->get();
        $sub_kriteria = SubKriteria::orderBy('nama', 'asc')->get();
        if ($request !== null) {
            $request = $request;
        } else {
            $request = null;
        }
        return view('penilaian.index')->with('kriteria', $kriteria)->with('sub_kriteria', $sub_kriteria)->with('mobil', $mobil)->with('request', $request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_matching(Request $request)
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
        return view('penilaian.profile_matching')->with('kriteria', $kriteria)
                                                 ->with('sub_kriteria', $sub_kriteria)
                                                 ->with('mobil', $mobil)
                                                 ->with('jenis_kriteria', $jenis_kriteria)
                                                 ->with('opt_alternatifs', $opt_alternatifs)
                                                 ->with('request', $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
