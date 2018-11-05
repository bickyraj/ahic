<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUnitCategory extends Model
{
    protected $fillable=[
          'name','order_by','status'
    ];
}
