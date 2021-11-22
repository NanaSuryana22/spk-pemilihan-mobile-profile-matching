<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use App\Http\Requests\AlternatifRequest;
use Session;
use Illuminate\Support\Str;

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
        return view('alternatif.create');
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
        return view('alternatif.show')->with('alternatif', $alternatif);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternatif  $alternatif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        return view('alternatif.edit')->with('alternatif', $alternatif);
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
