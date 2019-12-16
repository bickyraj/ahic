<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 protected $fillable = [
      'name','parent_id','page_id','status','menu_order'
  ];

  public function submenus(){
    return $this->hasMany('App\Menu','parent_id','id');
  }

  public function parent_menu(){
    return $this->belongsTo('App\Menu','parent_id','id');
  }
  public function parent_page(){
    return $this->belongsTo('App\Page','page_id','id');
  }
}
