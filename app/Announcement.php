<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $dates = [
        'expired_at',
        'created_at',
        'updated_at',
    ];

    public function announcer()
    {
        return $this->belongsTo('roombooker\User', 'announcer_id');
    }
}
