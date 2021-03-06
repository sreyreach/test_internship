<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    protected $table = "postjob";
    
    protected $fillable = [
        'title', 'company', 'job_type', 'location_id', 'job_description', 'user_id','company_profile',
        'post_date','closing_date','company_description','apply', 'category_id','job_type_id',
       
    ];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function jobType()
    {
        return $this->belongsTo('App\JobType');
    }

    public function category()
    {
        return $this->belongsTo('App\Catagory');
    }
}
