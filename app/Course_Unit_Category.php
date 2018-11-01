<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course_Unit_Category extends Model
{
    protected $table ="course_unit_category";
    protected $fillable=[
          'name','order_by','status'
    ];
}
