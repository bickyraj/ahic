<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable =[
        'title','image','description','status','order_by','date'
    ];
}
