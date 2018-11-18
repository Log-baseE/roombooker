<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public $timestamps = false;

    public function rooms()
    {
        return $this->belongsToMany('roombooker\Room', 'room_facilities', 'facility_id', 'room_id');
    }
}
