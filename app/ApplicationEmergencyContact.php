<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationEmergencyContact extends Model
{
    protected $fillable=['application_form_id','name','relationship','address','telephone','email','mobile'];
    //

    public function application_form()
    {
    	return $this->belongsTo('App\ApplicationForm');
    }
}
