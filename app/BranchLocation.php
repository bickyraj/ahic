<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchLocation extends Model
{
    protected $fillable =[
        'country_id','location','status'
    ];
    public function country(){
        return $this->belongsTo('App\Country','country_id','id');
    }
}
