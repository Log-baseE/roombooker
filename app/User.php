<?php

namespace roombooker;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'private_key',
    ];

    /**
     * Get role of user
     */
    public function role() {
        return $this->belongsTo('roombooker\UserRole');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->generatePrimaryKey();
            $model->generateRSAPair();
        });
    }

    /**
     * Generate RSA key pair
     *
     * @return boolean
     */
    protected function generateRSAPair()
    {
        $keypair = sodium_crypto_sign_keypair();
        $secret = sodium_crypto_sign_secretkey($keypair);
        $public = sodium_crypto_sign_publickey($keypair);

        $this->attributes['public_key'] = $public;
        $this->attributes['private_key'] = $secret;
        if( is_null($this->attributes['public_key']) || is_null($this->attributes['private_key']))
            return false;
        else
            return true;
    }

    /**
     * Generate user id
     *
     * @return boolean
     */
    protected function generatePrimaryKey()
    {
        $id = preg_replace("/[^A-Za-z0-9 ]/", '', Hash::make($this->name . time()));
        $id = substr($id, -32);
        $this->attributes['id'] = $id;
        if( is_null($this->attributes['id']) )
            return false;
        else
            return true;
    }
}
