<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $fillable = [
      'name','email','phone','course_id','phone','country_id','message','status'
    ];
}
