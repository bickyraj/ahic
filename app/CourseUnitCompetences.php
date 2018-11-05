<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUnitCompetences extends Model
{

 protected $fillable =[
     'course_unit_category_id','unit_code','description'
 ];

 public function category(){
    return $this->belongsTo('App\CourseUnitCategory','course_unit_category_id','id');
  }
}
