<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryCourseFee extends Model
{
  protected $fillable =['course_id','country_id','fee'];

  public function country(){
    return $this->belongsTo('App\Country');
  }
}
