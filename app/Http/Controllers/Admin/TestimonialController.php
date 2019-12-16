<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
  public $destination = 'public/images/testimonials/';
  public $images_dir = 'public/images/';

    public function __construct(){
      if(!is_dir($this->images_dir)){
        mkdir($this->images_dir);
      }
      if(!is_dir($this->destination)){
        mkdir($this->destination);
      }
    }

    public function index()
    {
        $t = Testimonial::with('country')->paginate(5);
        return Resource::collection($t);
    }

    public function store(Request $request)
    {
      $this->validate($request,[
        'name' => 'required',
        'description' => 'required',
        'country_id' => 'required',
        'testimonial_date' => 'required'
        // 'image' => 'required',
      ],[
        'name.required' =>'Name is required',
        'description.required' =>'Description is required',
        'country_id.required' =>'Select a country',
        'testimonial_date.required' =>'Date is required'
      ]);

      $data['name'] = $request->input('name');
      $data['description'] = $request->input('description');
      $data['country_id'] = $request->input('country_id');
      $data['testimonial_date'] = $request->input('testimonial_date');

      $image = $request->image;
    $image_array_1 = explode(";", $image);
    if (array_key_exists("1",$image_array_1)){
      $image_array_2 = explode(",", $image_array_1[1]);
      $imgdata = base64_decode($image_array_2[1]);
      $rand = rand(0,99999999);
      $rand = md5($rand);
      $imageName = $rand . '.png';
      $data['image']=$imageName;
      $dir = $this->destination.$imageName;
      file_put_contents($dir, $imgdata);
    }

      $creater = Testimonial::create($data);

    }

    public function show($id)
    {
        $t = Testimonial::findOrFail($id);
        return new Resource($t);
    }

    public function edit(Request $request)
    {
      $t = Testimonial::findOrFail($request->id);

      $data['name'] = $request->input('name');
      $data['description'] = $request->input('description');
      $data['country_id'] = $request->input('country_id');
      $data['testimonial_date'] = $request->input('testimonial_date');
      //image
      $image = $request->image;
    $image_array_1 = explode(";", $image);
    if (array_key_exists("1",$image_array_1)){
      $oldimg = $t->image;
      $this->destroyimage($oldimg);
      $image_array_2 = explode(",", $image_array_1[1]);
      $imgdata = base64_decode($image_array_2[1]);
      $rand = rand(0,99999999);
      $rand = md5($rand);
      $imageName = $rand . '.png';
      $data['image']=$imageName;
      $dir = $this->destination.$imageName;
      file_put_contents($dir, $imgdata);
    }
      $t->update($data);
    }
    public function update(Request $request)
    {
      $t = Testimonial::findOrFail($request->id);
      $data['status'] = $request->status;
      $t->update($data);
    }

    public function destroy($id)
    {
      $t = Testimonial::findOrFail($id);
        if($t){
          $this->destroyimage($t->image);
          $t->delete();
        }
    }
    public function destroyimage($image){
        $oldimg = $this->destination.$image;
        if(file_exists($oldimg)){
            @unlink($oldimg);
        }
    }


}
