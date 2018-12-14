<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $fillable=[
      'title','sub_title','image','description','link','slug'
    ];
}
