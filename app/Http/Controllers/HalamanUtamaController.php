<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;

class HalamanUtamaController extends Controller
{
    public function index()
    {
        $cars = Alternatif::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->limit(3)->get();
        return view('halaman_utama.index')->with('cars', $cars);
    }
}
