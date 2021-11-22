<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'jenis_kriteria_id', 
        'nama'
    ];

    protected $table = 'kriteria';

    public function jenis_kriteria()
    {
        return $this->belongsTo('App\Models\JenisKriteria', 'jenis_kriteria_id');
    }

    public function sub_kriterias()
    {
        return $this->hasMany('App\Models\SubKriteria', 'kriteria_id');
    }

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('jenis_kriteria_id', 'like', '%' .$term. '%')
                  ->orWhere('nama','like', '%' .$term. '%');
        });
    }
}
