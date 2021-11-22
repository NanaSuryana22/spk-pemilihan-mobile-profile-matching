<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'kriteria_id', 'nilai'
    ];

    protected $table = 'sub_kriteria';

    public function kriteria()
    {
        return $this->belongsTo('App\Models\Kriteria', 'kriteria_id');
    }

    public function opt_alternatifs()
    {
        return $this->hasMany('App\Models\OptAlternatif', 'sub_kriteria_id');
    }

    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function($query) use ($term) {
            $query->where('kriteria_id', 'like', '%' .$term. '%')
                  ->orWhere('nama','like', '%' .$term. '%')
                  ->orWhere('nilai','like', '%' .$term. '%');
        });
    }
}
