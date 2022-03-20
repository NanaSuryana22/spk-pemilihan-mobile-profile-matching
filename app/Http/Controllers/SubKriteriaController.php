<?php

namespace App\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SubKriteriaRequest;
use Illuminate\Support\Facades\Auth;

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
        $kriteria = Kriteria::where('user_id', Auth::user()->id)->orderBy('nama', 'asc')->get();
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
        $user_id = Auth::user()->id;

        $data = new SubKriteria();
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->user_id = $user_id;
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
        $kriteria     = Kriteria::where('user_id', Auth::user()->id)->orderBy('nama', 'asc')->get();
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
        $user_id = Auth::user()->id;

        $data = SubKriteria::find($id);
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->user_id = $user_id;
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
        $sub_kriteria = SubKriteria::find($id);
        $count_sub_kriteria_on_opt_alterantif = $sub_kriteria->opt_alternatifs()->count();
        if ($count_sub_kriteria_on_opt_alterantif >= 1) {
            Session::flash("error", "Sub Kriteria terpilih memiliki data sub mobil (alternatif), data gagal dihapus !");
            return redirect()->route("sub_kriteria.index");
        } else {
            $sub_kriteria->opt_alternatifs()->delete();
            $sub_kriteria->delete();
            Session::flash("notice", "Kriteria terpilih berhasil dihapus");
            return redirect()->route("kriteria.index");
        }
        SubKriteria::destroy($id);
    }
}
