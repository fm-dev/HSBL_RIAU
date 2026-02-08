<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datMenuChild extends Model
{
    protected $fillable = [
        'labelMenu',
        'path',
        'parentId',
        'roleId'
    ];

    public function parent()
    {
        return $this->belongsTo(datMenuParent::class, 'parentId');
    }

    public function role()
    {
        return $this->belongsTo(datrefrole::class, 'roleId');
    }
}
