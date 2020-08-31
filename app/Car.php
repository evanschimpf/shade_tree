<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = [
        'year',
        'make',
        'model',
        'sub_model',
        'engine',
        'mileage'
    ];

    public $description;
    public $year;
    public $make;
    public $model;
    public $sub_model;
    public $engine;
    public $mileage;
}

