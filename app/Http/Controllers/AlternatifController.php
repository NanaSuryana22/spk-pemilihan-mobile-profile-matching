<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Requests\AlternatifRequest;
use App\Models\OptAlternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Session;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\While_;
use DB;

class AlternatifController extends Controller
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
        return view('alternatif.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::orderBy('nama', 'asc')->get();
        $subkriteria = SubKriteria::orderBy('nama', 'asc')->get();
        return view('alternatif.create')->with('kriteria', $kriteria)->with('subkriteria', $subkriteria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlternatifRequest $request)
    {
        $data = new Alternatif();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $dp_image = 'img_alternatif/';
            $image_name = Str::random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
        }
        if ($request->hasFile('image')) {
            $data->image = $dp_image . $image_name;
        }
        $data->nama = $request->nama;
        $data->desc = $request->desc;
        $data->save();

        $kriteria = Kriteria::orderBy('nama', 'asc')->get();
        foreach($kriteria as $n) {
            $opt_alternatif = new OptAlternatif();
            $opt_alternatif->alternatif_id = $data->id;
            $opt_alternatif->kriteria_id = $n->id;
            $id = $n->id;
            $opt_alternatif->sub_kriteria_id = $request->$id;
            $opt_alternatif->save();
        }

        Session::flash("notice", "Data mobil $data->nama Berhasil Dibuat.");
        return redirect()->route("alternatif.show", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alternatif = Alternatif::find($id);
        $opt_alternatif = $alternatif->opt_alternatifs;
        return view('alternatif.show')->with('alternatif', $alternatif)->with('opt_alternatif', $opt_alternatif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif     = Alternatif::find($id);
        $kriteria       = Kriteria::orderBy('nama', 'asc')->get();
        $opt_alternatif = $alternatif->opt_alternatifs;
        return view('alternatif.edit')->with('alternatif', $alternatif)->with('kriteria', $kriteria)->with('opt_alternatif', $opt_alternatif);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function update(AlternatifRequest $request, $id)
    {
        $data = Alternatif::find($id);
        if (empty($request->file('image'))) {
            $image_n = $data->image;
        }
        else {
            $image = $request->file('image');
            $dp_image = 'img_alternatif/';
            $image_name = Str::random(6).'_'.$image->getClientOriginalName();
            $image->move($dp_image, $image_name);
            $image_n = $dp_image . $image_name;
        }
        $data->image = $image_n;
        $data->nama = $request->nama;
        $data->desc = $request->desc;
        $data->save();

        $kriteria = Kriteria::orderBy('nama', 'asc')->get();
        foreach($kriteria as $n) {
          $request_kriteria_id = $n->id;
          $opt_alternatif = OptAlternatif::where('kriteria_id', $n->id)->where('alternatif_id', $data->id)->first();
          if ($opt_alternatif !== null) {
            $kriteria_r = $n->id;
            $opt_alternatif->sub_kriteria_id = $request->$kriteria_r;
            $opt_alternatif->save();
          } else {
            $opt_alternatif = new OptAlternatif();
            $opt_alternatif->alternatif_id = $data->id;
            $opt_alternatif->kriteria_id = $n->id;
            $id = $n->id;
            $opt_alternatif->sub_kriteria_id = $request->$id;
            $opt_alternatif->save();
          }
        }

        Session::flash("notice", "Data mobil $data->nama Berhasil Diubah.");
        return redirect()->route("alternatif.show", $data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alternatif::destroy($id);
        Session::flash("notice", "Alternatif terpilih berhasil dihapus");
        return redirect()->route("alternatif.index");
    }
}
