<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['department_name', 'is_active'];

    public function teacher()
    {
        return $this->belongsToMany('App\Teacher');
    }

}
