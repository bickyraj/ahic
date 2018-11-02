<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   protected $fillable = [
      'name','slug','sub_title','parent_id','status','description'
  ];

  public function banners(){
    return $this->hasMany('App\Banner','page_id','id');
  }
  public function subpages(){
    return $this->hasMany('App\Page','parent_id' ,'id');
  }
    public function parent_page()
    {
        return $this->belongsTo('App\Page', 'parent_id');
    }
}
