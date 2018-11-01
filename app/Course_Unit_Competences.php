<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Unit_Competences extends Model
{
 protected $fillable =[
     'course_unit_category_id','unit_code','description'
 ];
}
