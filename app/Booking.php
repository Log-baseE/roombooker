<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    const PENDING_STATUS = 0;
    const ACCEPTED_STATUS = 200;
    const REJECTED_STATUS = -1;

    public $incrementing = false;

    protected $attributes = [
        'status' => self::PENDING_STATUS
    ];

    public function details()
    {
        return $this->belongsTo('roombooker\BookingDraft');
    }

    public function signatures()
    {
        return $this->hasMany('roombooker\Signature');
    }

    public function signees()
    {
        return $this->belongsToMany('roombooker\User', 'signatures', 'booking_id', 'signee_id');
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
