<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKriteria extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nilai', 'user_id'];

    protected $table = 'jenis_kriterias';

    public function kriteria()
    {
        return $this->hasOne('App\Models\Kriteria', 'jenis_kriteria_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
