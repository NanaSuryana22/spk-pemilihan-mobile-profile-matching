<?php

namespace App\Http\Controllers;

use App\Models\JenisKriteria;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\JenisKriteriaRequest;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class JenisKriteriaController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jenis_kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisKriteriaRequest $request)
    {
        $user_id = Auth::user()->id;

        $data = new JenisKriteria();
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->user_id = $user_id;
        $data->save();

        Session::flash("notice", "Jenis Kriteria Baru Berhasil Dibuat.");
        return redirect()->route("kriteria_types.show", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisKriteria  $jenisKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(JenisKriteria $jenisKriteria)
    {
        return view('jenis_kriteria.show', compact('jenisKriteria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisKriteria  $jenisKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisKriteria = JenisKriteria::find($id);
        return view('jenis_kriteria.edit')->with('jenisKriteria', $jenisKriteria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisKriteria  $jenisKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(JenisKriteriaRequest $request, $id)
    {
        $user_id = Auth::user()->id;

        $data = JenisKriteria::find($id);
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->user_id = $user_id;
        $data->save();

        Session::flash("notice", "Jenis Kriteria $data->nama Berhasil Diupdate");
        return redirect()->route("kriteria_types.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisKriteria  $jenisKriteria
     * @return \Illuminate\Http\Response
     * Tidak dibuat if else condition karna jenis kriteria tidak ada fitur hapus
     */
    public function destroy($id)
    {
        JenisKriteria::destroy($id);
        Session::flash("notice", "Jenis kriteria terpilih berhasil dihapus");
        return redirect()->route("kriteria_types.index");
    }
}
