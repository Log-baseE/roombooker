<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    public function signee()
    {
        return $this->belongsTo('roombooker\User');
    }

    public function booking()
    {
        return $this->belongsTo('roombooker\Booking', 'booking_id');
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
        $message = Hash::make($this->booking_id . time());
        $secret = $this->signee->private_key;
        $signature = sodium_crypto_sign_detached($message, $secret);
        $this->attributes['message'] = $message;
        $this->attributes['signature'] = $signature;
        if( is_null($this->attributes['signature']) || is_null($this->attributes['message']))
            return false;
        else
            return true;
    }

    public function verify()
    {
        return sodium_crypto_sign_verify_detached($this->signature, $this->message, $this->signee->public_key);
    }

}
