<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentInformation extends Model
{
protected $fillable=[
    'pan','first_name','last_name','telephone','mobile_no','email','address','start_date','logo'
];


}
