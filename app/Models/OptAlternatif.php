<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptAlternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'alternatif_id', 'kriteria_id', 'sub_kriteria_id'
    ];

    protected $table = 'opt_alternatifs';

    public function alternatif()
    {
        return $this->belongsTo('App\Models\Alternatif', 'alternatif_id');
    }

    public function kriteria()
    {
        return $this->belongsTo('App\Models\Kriteria', 'kriteria_id');
    }

    public function sub_kriteria()
    {
        return $this->belongsTo('App\Models\SubKriteria', 'sub_kriteria_id');
    }
}
