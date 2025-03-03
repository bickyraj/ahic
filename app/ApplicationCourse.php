<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCourse extends Model
{
   protected $fillable=[
        'course_id','application_form_id'
    ];

    public function course(){
        return $this->belongsTo('App\Course');
    }

}
