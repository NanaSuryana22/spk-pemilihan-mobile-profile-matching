<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'image', 'desc'];

    protected $table = 'alternatif';

    public function opt_alternatifs()
    {
        return $this->hasMany('App\Models\OptAlternatif', 'alternatif_id');
    }
}
