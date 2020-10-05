<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function day_wise_slot()
    {
        return $this->hasMany('App\Models\DayWiseSlot');
    }
}
