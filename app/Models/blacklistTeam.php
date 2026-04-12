<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blacklistTeam extends Model
{
    //
    protected $fillable = [
        'kompetisiEventId',
        'statusBlackList',
        'startDateBlackList',
        'endStartDateBlackList',
        'createdby',
        'modby'
    ];
}
