<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAdditionalServices extends Model
{
     protected $fillable=['application_form_id','airport_pickup','assistance_with_accomodation','accomodation_start_date','disability','if_disability','if_acco'];
}
