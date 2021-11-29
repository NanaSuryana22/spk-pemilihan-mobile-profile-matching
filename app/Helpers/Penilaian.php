<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Penilaian_1 {
	public static function get_value($kriteria_id, $sub_kriteria_id) {
		$sub_kriteria = DB::table('sub_kriteria')->where('id', $sub_kriteria_id)->where('kriteria_id', $kriteria_id)->first();
		return (isset($sub_kriteria->nilai) ? $sub_kriteria->nilai : '');
	}
}