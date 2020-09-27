<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'user_id',
        'thumbnail_id',
        'filename',
        'filepath',
        'title',
        'description'
    ];

    public function imageable() {
        return $this->morphTo();
    }

    public function thumbnail() {
        return $this->hasOne(Thumbnail::class);
    }
}
