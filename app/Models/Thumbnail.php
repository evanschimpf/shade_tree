<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    use HasFactory;

    protected $table = 'thumbnails';

    protected $fillable = [
        'image_id',
        'filename',
        'filepath',
    ];

    public function image() {
        return $this->belongsTo(Image::class);
    }
}
