<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $guarded = [];

    public function shift()
    {
        return $this->belongsTo('App\Models\Shift');
    }

//    public function day_wise_slot()
//    {
//        return $this->belongsToMany('App\Models\DayWiseSlot');
//    }
}
