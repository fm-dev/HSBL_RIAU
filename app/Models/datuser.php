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
        'modby'
    ];
    protected $hidden = [
        'password'
    ];
}
