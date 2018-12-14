<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Cms;
use App\Http\Resources\Menu as Resource;
use Illuminate\Http\Request;

class CmsController extends Controller
{
  public $destination = 'public/images/cms/';
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
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
    $file = $request->file('image');
    if($file){
      $ext = $file->getClientOriginalExtension();
      $filename = md5(rand(0,999999)).'.'.$ext;
      $data['image'] = $filename;
      $file->move($this->destination,$filename);
    }
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
    $file = $request->file('image');
    if($file != null){
      $oldimg = $s->image;
      $this->destroyimage($oldimg);
      $ext = $file->getClientOriginalExtension();
      $filename = md5(rand(0,999999)).'.'.$ext;
      $data['image']= $filename;
      $file->move($this->destination,$filename);
    }
    if($s->update($data)){
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
