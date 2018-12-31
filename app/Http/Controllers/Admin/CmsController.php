<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Cms;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\Menu as Resource;
use Illuminate\Http\Request;

class CmsController extends Controller
{
  public $destination = 'public/images/cms/';
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
    $a = Cms::all();
    return Resource::collection($a);
  }

public function slug($slug){
  $s = Cms::where('slug',$slug)->first();
  return new Resource($s);
}

  public function store(Request $request)
  {
    $data['slug'] = $request->input('slug');
    $data['title'] = $request->input('title');
    $data['sub_title'] = $request->input('sub_title');
    $data['description'] = $request->input('description');
    $data['link'] = $request->input('link');
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
  // if(isset($imageName)){
  //   $dir = $this->destination .'/' .$imageName;
  //   file_put_contents($dir, $imgdata);
  // }
    Cms::create($data);

    $a = Cms::all();
    return Resource::collection($a);
  }


  public function show($id)
  {
    $s = Cms::findOrFail($id);
    return new Resource($s);
  }

  public function update(Request $request)
  {
    $id = $request->id;

    $s = Cms::findOrFail($id);
    $data['slug'] = $request->input('slug');
    $data['link'] = $request->input('link');
    $data['title'] = $request->input('title');
    $data['sub_title'] = $request->input('sub_title');
    $data['description'] = $request->input('description');
    $data['status'] = $request->input('status');

            $image = $request->image;
          $image_array_1 = explode(";", $image);
          if (array_key_exists("1",$image_array_1)){
            $oldimg = $s->image;
            $this->destroyimage($oldimg);
            $image_array_2 = explode(",", $image_array_1[1]);
            $imgdata = base64_decode($image_array_2[1]);
            $rand = rand(0,99999999);
            $rand = md5($rand);
            $imageName = $rand . '.png';
            $data['image']=$imageName;
          }



    if($s->update($data)){
      if(isset($imageName)){
        $dir = $this->destination.$imageName;
        file_put_contents($dir, $imgdata);
      }
      $s = Cms::all();
      return Resource::collection($s);
    }

  }

  public function destroy($id)
  {
    $gallery = Cms::findOrFail($id);
    $this->destroyimage($gallery->image);
    if ($gallery->delete()) {
      $status = 1;
    }
    return response()->json([
      'status' => $status,
    ]);
  }

  public function destroyimage($image){
    $oldimg = $this->destination.$image;
    if(file_exists($oldimg)){
      @unlink($oldimg);
    }
  }


}
