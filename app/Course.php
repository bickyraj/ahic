<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'name','course_category_id','description','background_image','video_link','duration','study_method','order_by','status'
    ];
 public function category(){
    return $this->belongsTo('App\CourseCategory','course_category_id','id');
  }
}
