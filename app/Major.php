<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function faculty() {
        return $this->belongsTo('roombooker\Faculty');
    }
}
