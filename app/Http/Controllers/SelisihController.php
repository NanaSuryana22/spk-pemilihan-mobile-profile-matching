<?php

namespace App\Http\Controllers;

use App\Models\Selisih;
use Illuminate\Http\Request;
use App\Http\Requests\SelisihRequest;
use Session;

class SelisihController extends Controller
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
        return view('selisih.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('selisih.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SelisihRequest $request)
    {
        $data = new Selisih();
        $data->bobot = $request->bobot;
        $data->nilai = $request->nilai;
        $data->keterangan = $request->keterangan;
        $data->save();

        Session::flash("notice", "Selisih Baru Berhasil Dibuat.");
        return redirect()->route("selisih.show", $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Selisih  $selisih
     * @return \Illuminate\Http\Response
     */
    public function show(Selisih $selisih)
    {
        return view('selisih.show', compact('selisih'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Selisih  $selisih
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selisih = Selisih::find($id);
        return view('selisih.edit')->with('selisih', $selisih);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Selisih  $selisih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Selisih::find($id);
        $data->bobot = $request->bobot;
        $data->nilai = $request->nilai;
        $data->keterangan = $request->keterangan;
        $data->save();

        Session::flash("notice", "Data Selisih Terpilih Berhasil Diupdate");
        return redirect()->route("selisih.show", $data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Selisih  $selisih
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Selisih::destroy($id);
        Session::flash("notice", "Data Selisih terpilih berhasil dihapus");
        return redirect()->route("selisih.index");
    }
}
