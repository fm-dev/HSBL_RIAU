<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class datuser extends Authenticatable
{
    //
    use Notifiable;
    protected $fillable = [
        'username',
        'password',
        'email',
        'phone',
        'role',
        'status',
        'alamat',
        'createdby',
        'modby',
        'wilayah',
        'kompetisi_id',
        'series_id',
        'asal_sekolah',
        'wilayah'
    ];
    protected $hidden = [
        'password'
    ];
}
