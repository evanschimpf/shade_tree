<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageThumbnail extends Model
{
    protected $table = 'image_thumbnails';

    protected $fillable = [
        'filename',
        'filepath',
    ];
}
