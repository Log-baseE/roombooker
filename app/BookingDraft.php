<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class BookingDraft extends Model
{
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
}
