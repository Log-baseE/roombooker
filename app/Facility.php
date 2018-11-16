<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    public function rooms()
    {
        return $this->belongsToMany('roombooker\Room');
    }
}
