<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryCategory extends Model
{
	// use SoftDeletes;
	
	protected $fillable = [
		'name', 'status'
	];

	public function galleries()
	{
		return $this->hasMany('App\Gallery');
	}

	public function latest_gallery()
	{
	    return $this->hasOne('App\Gallery')->latest();
	}
}
