<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleContent extends Model
{
  protected $fillable=[
      'module_id','title','description','image','status','order_by'
  ];
  public function module(){
    return $this->belongsTo('App\Module','module_id','id');
  }

}
