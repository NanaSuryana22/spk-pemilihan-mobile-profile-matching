<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selisih extends Model
{
    use HasFactory;

    protected $fillable = ['nilai', 'bobot', 'keterangan'];

    protected $table = 'selisih';
}
