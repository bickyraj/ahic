<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationIfStudentUnderAge extends Model
{
protected $fillable=['application_form_id','parent_name','contact_detail','date'];
}
