<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\JenisKriteria;
use Illuminate\Http\Request;
use App\Http\Requests\KriteriaRequest;
use App\Http\Requests\SubKriteriaRequest;
use App\Models\SubKriteria;
use Session;

class KriteriaController extends Controller
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
        return view('kriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kriteria = JenisKriteria::orderBy('nama', 'asc')->get();
        return view('kriteria.create')->with('jenis_kriteria', $jenis_kriteria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaRequest $request)
    {
        $data = new Kriteria();
        $data->nama = $request->nama;
        $data->jenis_kriteria_id = $request->jenis_kriteria_id;
        $data->save();

        Session::flash("notice", "Kriteria $data->nama Berhasil Dibuat.");
        return redirect()->route("kriteria.show", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = Kriteria::find($id);
        $datas    = SubKriteria::where('kriteria_id', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('kriteria.show')->with('kriteria', $kriteria)->with('datas', $datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria       = Kriteria::find($id);
        $jenis_kriteria = JenisKriteria::orderBy('nama', 'asc')->get();
        return view('kriteria.edit')->with('jenis_kriteria', $jenis_kriteria)->with('kriteria', $kriteria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(KriteriaRequest $request, $id)
    {
        $data = Kriteria::find($id);
        $data->nama = $request->nama;
        $data->jenis_kriteria_id = $request->jenis_kriteria_id;
        $data->save();

        Session::flash("notice", "Kriteria $data->nama Berhasil Diupdate");
        return redirect()->route("kriteria.show", $data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $count_sub_kriteria = $kriteria->sub_kriterias()->count();
        if ($count_sub_kriteria >= 1) {
            Session::flash("error", "Kriteria terpilih memiliki data sub kriteria, data gagal dihapus !");
            return redirect()->route("kriteria.show", $kriteria);
        } else {
            $kriteria->sub_kriterias()->delete();
            $kriteria->delete();
            Session::flash("notice", "Kriteria terpilih berhasil dihapus");
            return redirect()->route("kriteria.index");
        }
    }

    public function storesubkriteria(SubKriteriaRequest $request)
    {
        $data = new SubKriteria();
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->save();

        Session::flash("notice", "Sub Kriteria $data->nama Berhasil Dibuat.");
        return redirect()->route("kriteria.show", Kriteria::find($data->kriteria_id));
    }

    public function destroysubkriteria($id)
    {
      $subkriteria = SubKriteria::find($id);
      $kriteria = Kriteria::find($subkriteria->kriteria_id);
      $subkriteria->delete();
      Session::flash("notice", "Sub Kriteria terpilih berhasil dihapus");
      return redirect()->route("kriteria.show", $kriteria);
    }

    public function editsubkriteria($id)
    {
        $sub_kriteria = SubKriteria::find($id);   
        $kriteria    = $sub_kriteria->kriteria;
        return view('kriteria.edit_subkriteria')->with('sub_kriteria', $sub_kriteria)->with('kriteria', $kriteria);
    }

    public function updatesubkriteria(SubKriteriaRequest $request, $id)
    {
        $data = SubKriteria::find($id);
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->save();

        Session::flash("notice", "Sub Kriteria $data->nama Berhasil Diedit.");
        return redirect()->route("kriteria.show", $data->kriteria);
    }
}
