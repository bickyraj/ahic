<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationCourseAndOtherFees extends Model
{
    protected $fillable=['application_form_id','application_fee','tution_fee','overseas_student_health_cover','airport_pickup_fee'];
    //
}
