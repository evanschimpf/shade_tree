<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';

    public static $JOB_TYPE_REPAIR = 0;
    public static $JOB_TYPE_UPGRADE = 1;
    public static $JOB_TYPE_SCHEDULED_MAINTENANCE = 2;

    protected $fillable = [
        'type',
        'time',
        'duration'
    ];
}
