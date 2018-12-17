<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable =[
      'name','phone','email','address','facebook','twitter','in','pin','ABN','RTO','CRICOS'
    ];
}
