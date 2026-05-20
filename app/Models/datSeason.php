<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datSeason extends Model
{
    //
    protected $fillable = [
        'name',
        'path_template_izinOrtu',
        'path_template_izin_kepala_sekolah',
        'regulasi',
        'syarat_pendaftaran',
        'roster',
        'seriesId',
        'createdby',
        'modby'
    ];
}
