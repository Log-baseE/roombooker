<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class BookingSchedule extends Model
{
    public function booking()
    {
        return $this->belongsTo('roombooker\BookingDraft');
    }
}
