<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
     protected $fillable=[
        'date_of_intake_id','firstname','middlename','familyname','dob','gender','birth_country','birth_city','usi_number','in_australia','visa_category','visa_expired_date','visa_office_applying_for','islander_orgin'
    ];
}
