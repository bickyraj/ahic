<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationAgent extends Model
{
  protected $fillable=['application_form_id','company_id'];

  public function details(){
    return $this->belongsTo('App\ApplicationForm','application_form_id','id');
  }

}
