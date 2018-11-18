<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public $timestamps = false;

    public function rooms()
    {
        return $this->belongsToMany('roombooker\Room');
    }
}
