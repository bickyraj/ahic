<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleContent extends Model
{
  protected $fillable=[
      'module_id','title','description','image','status'
  ];
}
