<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[
        'name','course_category_id','description','background_image','video_link','duration','study_method','order_by','status','code', 'cricos_code'
    ];
    public function category()
    {
        return $this->belongsTo('App\CourseCategory', 'course_category_id', 'id');
    }
    public function requirements()
    {
        return $this->hasMany('App\CourseEntryRequirement', 'course_id', 'id');
    }
    public function outcomes()
    {
        return $this->hasMany('App\CourseCareerOutcome', 'course_id', 'id');
    }
    public function assessment()
    {
        return $this->hasOne('App\CourseAssessment', 'course_id', 'id');
    }
    public function rpl()
    {
        return $this->hasOne('App\CourseRpl', 'course_id', 'id');
    }

    public function application_course()
    {
        return $this->hasMany('App\ApplicationCourse');
    }
    public function relation()
    {
        return $this->hasMany('App\CourseUnitRelation');
    }
}
