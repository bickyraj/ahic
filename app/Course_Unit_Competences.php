<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Unit_Competences extends Model
{
    protected $table ="course_unit_competences";

 protected $fillable =[
     'course_unit_category_id','unit_code','description'
 ];
}
