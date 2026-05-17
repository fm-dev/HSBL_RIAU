<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datEventsScore extends Model
{
    //
    protected $fillable = [
        'kompetisi_id',
        'firstTeam_id',
        'secondTeam_id',
        'datebegin',
        'time_begin',
        'score_first_teeam',
        'score_second_teeam',
        'isFinal',
    ];
}
