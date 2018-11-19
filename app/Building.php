<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function rooms()
    {
        return $this->hasMany('roombooker\Room')->orderBy('name', 'asc');
    }
}
