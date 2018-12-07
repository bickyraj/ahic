<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageModule extends Model
{
     protected $fillable=[
      'page_id','module_id','order_by'
  ];

  public function page(){
    return $this->belongsTo('App\Page','page_id','id');
  }
  public function module(){
    return $this->belongsTo('App\Module','module_id','id');
  }
  // public function content(){
  //   return $this->belongsTo('App\ModuleContent');
  // }
}
