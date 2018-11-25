<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationEducationalQualification extends Model
{
    protected $fillable=['application_form_id','qualification','educational_institution','start_year','start_month','completed_year','completed_month'];
    //
}
