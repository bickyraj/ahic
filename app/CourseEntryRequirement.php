<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseEntryRequirement extends Model
{
         protected $fillable =[
      'course_id','description','order'
  ];
  public function course(){
    return $this->belongsTo('App\Course','course_id','id');
  }
}
