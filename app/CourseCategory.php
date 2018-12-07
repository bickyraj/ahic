<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $table="course_categories";
    protected $fillable =[
        'name','image_background','order_by','status'
    ];

    public function courses(){
      return $this->hasMany('App\Course');
    }
}
