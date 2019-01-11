<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
  protected $fillable =['name','image','description','country_id','status','testimonial_date'];

  public function country(){
    return $this->belongsTo('App\Country');
  }

}
