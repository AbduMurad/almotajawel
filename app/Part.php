<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    //
    protected $fillable = [
        'serial_number',
        'original_name',
        'name',
        'side',
        'vehicle_id',
        'manufacturer'
    ];

    const sides = [
            'f' => 'Front',
            'b' => 'back',
            'r' => 'right',
            'l' => 'lift',
            'fr' => 'Front right',
            'fl' => 'Front Left',
            'br' => 'Back Right',
            'bl' => 'Back Left'
        ];

    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }

    public function vehicle() {
        return $this->belongsTo('App\Vehicle');
    }
    
}
 