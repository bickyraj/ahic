<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentInformation extends Model
{
	// agent_request = [0= added by admin, 1= accepted, 2 = pending]
	protected $fillable=[
	    'pan','first_name','last_name','telephone','mobile_no','email','address','start_date','logo', 'agent_request'
	];

	public function documents(){
	  return $this->hasMany('App\AgentDocument','agent_id');
	}
}
