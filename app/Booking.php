<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function details()
    {
        return $this->belongsTo('roombooker\BookingDraft');
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
        $id = "B-" . preg_replace("/0.(\d+) (\d+)/", "$2$1", microtime());

        $this->attributes['id'] = $id;
        if( is_null($this->attributes['id']) )
            return false;
        else
            return true;
    }
}
