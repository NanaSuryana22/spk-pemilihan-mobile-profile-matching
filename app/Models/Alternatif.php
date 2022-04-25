<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'image', 'desc', 'user_id'];

    protected $table = 'alternatifs';

    public function opt_alternatifs()
    {
        return $this->hasMany('App\Models\OptAlternatif', 'alternatif_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
