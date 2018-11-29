<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
     protected $fillable=[
        'date_of_intake_id','firstname','middlename','familyname','dob','gender','birth_country','birth_city','usi_number','in_australia','visa_category','visa_expired_date','visa_office_applying_for','islander_origin'
    ];

    public function edu(){
        return $this->hasMany('App\ApplicationEducationalQualification','application_form_id','id');
    }
    public function date_of_intake(){
        return $this->belongsTo('App\ApplicationDateOfIntake','date_of_intake_id','id');
    }
    public function course(){
       return $this->belongsTo('App\ApplicationCourse','id','application_form_id');
    }
 
    public function passport(){
        return $this->hasOne('App\ApplicantPassport','application_form_id','id');
    }
    public function aus(){
        return $this->hasOne('App\ApplicationAddressInAustralia','application_form_id','id');
    }
    public function home(){
        return $this->hasOne('App\ApplicationAddressInHomeCountry','application_form_id','id');
    }
    public function econtact(){
        return $this->hasOne('App\ApplicationEmergencyContact','application_form_id','id');
    }
    public function english(){
        return $this->hasOne('App\ApplicationCurrentEnglishLevel','application_form_id','id');
    }
    public function rpl(){
        return $this->hasOne('App\ApplicationRecognitionOfPriorLearning','application_form_id','id');
    }
    public function services(){
        return $this->hasOne('App\ApplicationAdditionalServices','application_form_id','id');
    }
    public function checklist(){
        return $this->hasOne('App\ApplicationCheckList','application_form_id','id');
    }
    public function fee(){
        return $this->hasOne('App\ApplicationCourseAndOtherFees','application_form_id','id');
    }
    public function underage(){
        return $this->hasOne('App\ApplicationIfStudentUnderAge','application_form_id','id');
    }
}
