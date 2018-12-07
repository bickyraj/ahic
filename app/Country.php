<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable =[
        'name','status'
    ];

    public function locations(){
        return $this->hasMany('App\BranchLocation','country_id','id');
    }

}
