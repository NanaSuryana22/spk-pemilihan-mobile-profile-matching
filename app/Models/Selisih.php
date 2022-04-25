<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selisih extends Model
{
    use HasFactory;

    protected $fillable = ['nilai', 'bobot', 'keterangan', 'user_id'];

    protected $table = 'selisihs';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
