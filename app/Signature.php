<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('signee_id', '=', $this->getAttribute('signee_id'))
            ->where('booking_id', '=', $this->getAttribute('booking_id'));
        return $query;
    }

    public function signee()
    {
        return $this->belongsTo('roombooker\User');
    }

    public function booking()
    {
        return $this->belongsTo('roombooker\Booking');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->generateSignature();
        });
    }

    protected function generateSignature()
    {
        $message = $this->booking_id . $this->created_at;
        $secret = $this->signee->private_key;
        $signature = sodium_crypto_sign_detached($message, $secret);

        $this->attributes['signature'] = $signature;
        if( is_null($this->attributes['signature']) )
            return false;
        else
            return true;
    }
}
