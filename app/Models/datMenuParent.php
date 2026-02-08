<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datMenuParent extends Model
{
    protected $fillable = [
        'labelMenu',
        'path',
        'roleId',
    ];

    public function children()
    {
        return $this->hasMany(datMenuChild::class, 'parentId');
    }
}
