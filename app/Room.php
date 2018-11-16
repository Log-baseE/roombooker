<?php

namespace roombooker;

use Illuminate\Database\Eloquent\Model;
use Hash;

class Room extends Model
{
    // Create custom primary key
    public $incrementing = false;
    protected $keyType = 'string';


    protected $attributes = [
        'active' => true
    ];

    /**
     * Get building of room
     */
    public function building() {
        return $this->belongsTo('roombooker\Building');
    }

    /**
     * Boot function
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->generatePrimaryKey();
        });
    }

    protected function generatePrimaryKey()
    {
        $id = preg_replace("/[^A-Za-z0-9 ]/", '', Hash::make($this->name . time()));
        $id = substr($id, -8);
        print($id);
        $this->attributes['id'] = $id;
        if( is_null($this->attributes['id']) )
            return false;
        else
            return true;
    }
}
