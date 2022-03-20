<?php

use App\Models\JenisKriteria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

function get_nilai_sub_kriteria($sub_kriteria_id) {
	$sub_kriteria = DB::table('sub_kriteria')->where('id', $sub_kriteria_id)->where('user_id', Auth::user()->id)->first();
	return (isset($sub_kriteria->nilai) ? $sub_kriteria->nilai : 0);
}

function get_nilai_gap($nilai_filter,$nilai_profile) {
	$nilai = $nilai_profile-$nilai_filter;
	return (isset($nilai) ? $nilai : 0);
}

function get_nilai_selisih($nilai_gap) {
	$selisih = DB::table('selisih')->where('user_id', Auth::user()->id)->where('nilai', $nilai_gap)->first();
	return (isset($selisih->bobot) ? $selisih->bobot : '');
}

function get_nilai_akhir($ncf,$nsf) {
	$core_factor = JenisKriteria::where('nama','Core Factor (CF)')->where('user_id', Auth::user()->id)->first()->nilai;
	$secondary_factor = JenisKriteria::where('nama','Secondary Factor (SF)')->where('user_id', Auth::user()->id)->first()->nilai;
	$nilai_akhir = ($core_factor*$ncf)+($secondary_factor*$nsf);
	return $nilai_akhir;
}
