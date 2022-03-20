<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\JenisKriteria;
use Illuminate\Http\Request;
use App\Http\Requests\KriteriaRequest;
use App\Http\Requests\SubKriteriaRequest;
use App\Models\Alternatif;
use App\Models\OptAlternatif;
use App\Models\SubKriteria;
use Mockery\Matcher\Subset;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
        $jenis_kriteria = JenisKriteria::where('user_id', Auth::user()->id)->orderBy('nama', 'asc')->get();
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
        $user_id = Auth::user()->id;

        $data = new Kriteria();
        $data->nama = $request->nama;
        $data->jenis_kriteria_id = $request->jenis_kriteria_id;
        $data->user_id = $user_id;
        $data->save();

        $sub_kriteria = new SubKriteria();
        $sub_kriteria->kriteria_id = $data->id;
        $sub_kriteria->nama = $request->nama_sub_kriteria;
        $sub_kriteria->nilai = $request->nilai;
        $sub_kriteria->user_id = $user_id;
        $sub_kriteria->save();

        $data_mobil = Alternatif::where('user_id', Auth::user()->id)->get();
        foreach($data_mobil as $d) {
            $opt_alternatif = new OptAlternatif();
            $opt_alternatif->alternatif_id = $d->id;
            $opt_alternatif->kriteria_id = $data->id;
            $opt_alternatif->sub_kriteria_id = $sub_kriteria->id;
            $opt_alternatif->user_id = $user_id;
            $opt_alternatif->save();
        }

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
        $kriteria = Kriteria::where('user_id', Auth::user()->id)->where('id', $id)->first();
        $datas    = SubKriteria::where('user_id', Auth::user()->id)->where('kriteria_id', $id)->orderBy('nilai', 'desc')->paginate(10);
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
        $jenis_kriteria = JenisKriteria::where('user_id', Auth::user()->id)->orderBy('nama', 'asc')->get();
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
        $user_id = Auth::user()->id;

        $data = Kriteria::find($id);
        $data->nama = $request->nama;
        $data->jenis_kriteria_id = $request->jenis_kriteria_id;
        $data->user_id = $user_id;
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
        $count_sub_kriteria = $kriteria->opt_alternatifs()->count();
        if ($count_sub_kriteria >= 1) {
            Session::flash("error", "Kriteria terpilih memiliki data sub mobil (alternatif), data gagal dihapus !");
            return redirect()->route("kriteria.show", $kriteria);
        } else {
            $kriteria->opt_alternatifs()->delete();
            $kriteria->sub_kriterias()->delete();
            $kriteria->delete();
            Session::flash("notice", "Kriteria terpilih berhasil dihapus");
            return redirect()->route("kriteria.index");
        }
    }

    public function storesubkriteria(SubKriteriaRequest $request)
    {
        $user_id = Auth::user()->id;

        $data = new SubKriteria();
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->user_id = $user_id;
        $data->save();

        Session::flash("notice", "Sub Kriteria $data->nama Berhasil Dibuat.");
        return redirect()->route("kriteria.show", Kriteria::find($data->kriteria_id));
    }

    public function destroysubkriteria($id)
    {
      $subkriteria = SubKriteria::find($id);
      $kriteria = Kriteria::find($subkriteria->kriteria_id);
      $count_sub_kriteria_on_opt_alterantif = $subkriteria->opt_alternatifs()->count();
      if($count_sub_kriteria_on_opt_alterantif >=1) {
        $subkriteria->opt_alternatifs()->delete();
      }
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
        $user_id = Auth::user()->id;

        $data = SubKriteria::find($id);
        $data->user_id = $user_id;
        $data->nama = $request->nama;
        $data->nilai = $request->nilai;
        $data->kriteria_id = $request->kriteria_id;
        $data->save();

        Session::flash("notice", "Sub Kriteria $data->nama Berhasil Diedit.");
        return redirect()->route("kriteria.show", $data->kriteria);
    }
}
