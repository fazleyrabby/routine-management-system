<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YearlySession extends Model
{
    protected $table = 'yearly_sessions';

    protected $guarded = [];

    public function shift_session()
    {
        return $this->belongsTo('App\Models\ShiftSession');
    }
}
