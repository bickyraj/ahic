<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $destination = 'public/images/news/';
    public function __construct(){
      if(is_dir($this->destination)){

      }else{
        mkdir($this->destination);
      }
    }

    public function index()
    {
        $n = News::orderBy('order_by','asc')->get();
        return Resource::collection($n);
    }


    public function store(Request $request)
    {
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['date'] = $request->input('date');
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
        $create = News::create($data);
        if($create){
        $n = News::orderBy('order_by','asc')->get();
        return Resource::collection($n);
        }
    }


    public function show($id)
    {
        $n = News::findOrFail($id);
        return new Resource($n);
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $news = News::findOrFail($id);
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        $data['date'] = $request->input('date');
        $image = $request->image;
      $image_array_1 = explode(";", $image);
      if (array_key_exists("1",$image_array_1)){
        $oldimg = $news->image;
        $this->destroyimage($oldimg);
        $image_array_2 = explode(",", $image_array_1[1]);
        $imgdata = base64_decode($image_array_2[1]);
        $rand = rand(0,99999999);
        $rand = md5($rand);
        $imageName = $rand . '.png';
        $data['image']=$imageName;
      }

        $update = $news->update($data);
        if($update){
          if(isset($imageName)){
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
          }
             $n = News::orderBy('order_by','asc')->get();
        return Resource::collection($n);
        }


    }
     public function destroy($id)
    {
      $news = News::findOrFail($id);
       $this->destroyimage($news->image);
        if ($news->delete()) {
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
