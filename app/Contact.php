<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =[
      'name','phone','email','address','street_name','ABN','RTO','CRICOS','call_time','fb','in','tw','yt','message'
    ];
}
