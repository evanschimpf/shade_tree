<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'description',
        'year',
        'make',
        'model',
        'sub_model',
        'engine',
        'mileage'
    ];
}

