<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKriteria extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nilai'];

    protected $table = 'jenis_kriterias';

    public function kriteria()
    {
        return $this->hasOne('App\Models\Kriteria', 'jenis_kriteria_id');
    }
}
