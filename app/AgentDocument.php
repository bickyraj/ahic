<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentDocument extends Model
{
    protected $fillable=[
        'agent_id','EOI','ABN','reference','qualification','profile','address','country','company_name','location'
    ];

    public function process(){
        return $this->hasOne('App\AgentAgreementProcess','agent_document_id','id');
    }
    public function shore(){
        return $this->belongsTo('App\Country','country');
    }
    public function students(){
      return $this->hasMany('App\ApplicationAgent','company_id','id');
    }
    public function agent(){
      return $this->belongsTo('App\AgentInformation');
    }
}
