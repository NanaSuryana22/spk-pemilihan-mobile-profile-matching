<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'jenis_kriteria_id', 
        'nama',
        'user_id'
    ];

    protected $table = 'kriterias';

    public function jenis_kriteria()
    {
        return $this->belongsTo('App\Models\JenisKriteria', 'jenis_kriteria_id');
    }

    public function sub_kriterias()
    {
        return $this->hasMany('App\Models\SubKriteria', 'kriteria_id');
    }

    public function opt_alternatifs()
    {
        return $this->hasMany('App\Models\OptAlternatif', 'kriteria_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('jenis_kriteria_id', 'like', '%' .$term. '%')
                  ->where('user_id', Auth::user()->id)
                  ->orWhere('nama','like', '%' .$term. '%')
                  ->where('user_id', Auth::user()->id);
        });
    }
}
