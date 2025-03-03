<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  protected $fillable=[
      'title','display_type','status'
  ];

  public function content(){
    return $this->hasMany('App\ModuleContent');
  }
}
