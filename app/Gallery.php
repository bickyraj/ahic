<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $fillable =[
		'image','status','order_by', 'gallery_category_id'
	];

	public function gallery_category()
	{
		return $this->belongsTo('App\GalleryCategory');
	}
}
