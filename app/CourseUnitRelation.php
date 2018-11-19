<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUnitRelation extends Model
{
    protected $fillable =[
     'course_id','course_unit_competence_id','course_unit_category_id'
 ];
 public function course(){
     return $this->belongsTo('App\Course','course_id','id');
 }
 public function competence(){
     return $this->belongsTo('App\CourseUnitCompetences','course_unit_competence_id','id');
 }
   public function category(){
    return $this->belongsTo('App\CourseUnitCategory','course_unit_category_id','id');
  }

}
