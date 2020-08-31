<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    public static $JOB_TYPE_REPAIR = 0;
    public static $JOB_TYPE_UPGRADE = 1;
    public static $JOB_TYPE_SCHEDULED_MAINTENANCE = 2;

    protected $fillable = [
        'type',
        'time',
        'duration'
    ];


    /**
     * @var mixed
     */
    public $car_id;
    /**
     * @var mixed
     */
    public $title;
    /**
     * @var mixed
     */
    public $description;
    /**
     * @var mixed
     */
    public $type;
    /**
     * @var mixed
     */
    public $start;
    /**
     * @var mixed
     */
    public $end;
    /**
     * @var mixed
     */
    public $labor;

}
