<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;

class HalamanUtamaController extends Controller
{
    public function index()
    {
        $cars = Alternatif::orderBy('created_at', 'desc')->limit(3)->get();
        return view('halaman_utama.index')->with('cars', $cars);
    }
}
