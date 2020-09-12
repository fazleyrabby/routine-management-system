<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionStudent extends Model
{
    protected $table = 'section_students';

    public function student()
    {
        return $this->belongsToMany('App\Models\Student');
    }
}
