<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    protected $table = 'carImages';

    protected $fillable = [
        'car_id',
        'image_id'
    ];
}
