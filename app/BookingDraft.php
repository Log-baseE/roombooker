<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class BookingDraft extends Model
{
    public $incrementing = false;

    public function booker()
    {
        return $this->belongsTo('roombooker\User');
    }

    public function room()
    {
        return $this->belongsTo('roombooker\Room');
    }

    public function schedules()
    {
        return $this->hasMany('roombooker\Schedule');
    }

    public function facilities()
    {
        return $this->belongsToMany('roombooker\Facility', 'booked_facilities', 'draft_id', 'facility_id')
                    ->wherePivot('room_id', $this->room_id);
    }

    public function booking()
    {
        return $this->hasOne('roombooker\Booking', 'draft_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->generateID();
        });
    }

    protected function generateID()
    {
        // Format: BD-
        $id = "BD-" . preg_replace("/0.(\d+) (\d+)/", "$2$1", microtime());

        $this->attributes['id'] = $id;
        if( is_null($this->attributes['id']) )
            return false;
        else
            return true;
    }

    public function getTrimmedIdAttribute()
    {
        return preg_replace('/BD\-(.*)/','$1',$this->id);
    }
}
