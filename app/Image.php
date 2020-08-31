<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'thumbnail_id',
        'filename',
        'filepath',
        'title',
        'description'
    ];

    //public $thumbnail_id;
    public $filename;
    public $filepath;
    public $title;
    public $description;
}
