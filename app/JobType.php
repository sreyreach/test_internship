<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    protected $table = "job_type";
    protected $fillable = [
        'job_type',
     ];
}
