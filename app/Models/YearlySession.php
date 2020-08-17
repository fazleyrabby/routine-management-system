<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearlySession extends Model
{
    protected $table = 'yearly_sessions';

    public function shift_session()
    {
        return $this->belongsToMany('App\Models\Shift');
    }
}