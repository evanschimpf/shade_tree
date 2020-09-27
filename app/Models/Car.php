<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'user_id',
        'description',
        'year',
        'make',
        'model',
        'sub_model',
        'engine',
        'mileage'
    ];

    public function images() {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
