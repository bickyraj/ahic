<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
protected $fillable =[
    'image','status','order_by'
];
}
