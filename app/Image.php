<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type'
    ];

    const vehicles_dir = '/vehicle_images/';
    const parts_dir = '/part_images/';

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getPathAttribute ($image) {

        if($this->imageable_type == 'App\Vehicle') {
            return Image::vehicles_dir . $image;
        }
        if($this->imageable_type == 'App\Part') {
            return Image::parts_dir . $image;
        }

    }
}
