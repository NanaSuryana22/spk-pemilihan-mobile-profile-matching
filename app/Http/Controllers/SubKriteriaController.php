<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\SubKriteriaRequest;

class SubKriteriaController extends Controller
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
        return view('sub_kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::orderBy('nama', 'asc')->get();
        return view('sub_kriteria.create')->with('kriteria', $kriteria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubKriteriaRequest $request)
    {
        $data = new SubKriteria();
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->save();

        Session::flash("notice", "Sub Kriteria $data->nama Berhasil Dibuat.");
        return redirect()->route("sub_kriteria.show", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_kriteria = SubKriteria::find($id);
        return view('sub_kriteria.show')->with('sub_kriteria', $sub_kriteria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_kriteria = SubKriteria::find($id);
        $kriteria     = Kriteria::orderBy('nama', 'asc')->get();
        return view('sub_kriteria.edit')->with('sub_kriteria', $sub_kriteria)->with('kriteria', $kriteria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = SubKriteria::find($id);
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->save();

        Session::flash("notice", "Sub Kriteria $data->nama Berhasil Diedit.");
        return redirect()->route("sub_kriteria.show", $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubKriteria::destroy($id);
        Session::flash("notice", "Sub Kriteria terpilih berhasil dihapus");
        return redirect()->route("sub_kriteria.index");
    }
}
