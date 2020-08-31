<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageThumbnail extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'filename',
        'filepath',
    ];

    public $filename;
    public $filepath;
}
