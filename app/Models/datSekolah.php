<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datSekolah extends Model
{
    //
    protected $fillable = [
        'namaSekolah',
        'logo',
        'createdby',
        'modby'
    ];
}
