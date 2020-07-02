<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $fillable = [
        'original_name',
        'name',
    ];

    public function image () {
        return $this->morphOne('App\Image', 'imageable');
    }

}
