<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCareerOutcome extends Model
{
  protected $fillable =[
      'course_id','description'
  ];
  public function course(){
    return $this->belongsTo('App\Course','course_id','id');
  }
}
