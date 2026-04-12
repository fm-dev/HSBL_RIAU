<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datKompetisiEvent extends Model
{
    //
    protected $fillable = [
        'idSekolah',
        'namaTeam',
        'idKompetisi',
        'idSeries',
        'leader',
        'kunciData',
        'verifData',
        'createdby',
        'modby'
    ];
}
