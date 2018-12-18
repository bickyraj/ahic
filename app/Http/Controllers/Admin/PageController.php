<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Resources\Page as PageResource;


class PageController extends Controller
{
    public $destination = 'public/images/pages/';

//create dir
public function __construct(){
  if(is_dir($this->destination)){

  }else{
    mkdir($this->destination);
  }
}


    public function index(){
        $page = Page::with('parent_page')->get();
        return PageResource::collection($page);
    }
    public function show($id){
        $page = Page::findOrFail($id);
        return new PageResource($page);
    }

    public function get($id){
        $page = Page::where('id',$id);
        if(count($page->get())>0){
            $page = $page->first();
        return new PageResource($page);
        }
        else{
            return 'error';
        }
    }
    public function store(Request $request){
        $data['name'] = $request->input('name');
        $data['parent_id'] = $request->input('parent_id');
        $data['sub_title'] = $request->input('sub_title');
        $data['sub_title'] = $request->input('sub_title');
        $data['description'] = $request->input('description');
        $data['status']=1;
         $image = $request->image;
       $image_array_1 = explode(";", $image);
       if (array_key_exists("1",$image_array_1)){

         $image_array_2 = explode(",", $image_array_1[1]);
         $imgdata = base64_decode($image_array_2[1]);
         $rand = rand(0,99999999);
         $rand = md5($rand);
         $imageName = $rand . '.png';
         $data['image']=$imageName;
       }
        $data['slug'] = $this->create_slug_title($request->input('name'));

	         $create = Page::create($data);
    	if ($create) {
      if(isset($imageName)){
        $dir = $this->destination.$imageName;
        file_put_contents($dir, $imgdata);
      }
    	}
       $page = Page::with('parent_page')->get();
        return PageResource::collection($page);
    }

      public function create_slug_title($title)
    {
        $str = strTolower($title);
        return str_replace(" ", "-", $str);
    }

    public function update(Request $request){
	        $status = 0;
        $page = Page::findOrFail($request->id);
        $page->name = $request->input('name');
        $page->slug = $this->create_slug_title($request->input('name'));
        $page->parent_id = $request->input('parent_id');
        $page->description=$request->input('description');
        $page->sub_title=$request->input('sub_title');

        $image = $request->image;
      $image_array_1 = explode(";", $image);
      if (array_key_exists("1",$image_array_1)){
        $oldimg = $page->image;
        $this->destroyimage($oldimg);
        $image_array_2 = explode(",", $image_array_1[1]);
        $imgdata = base64_decode($image_array_2[1]);
        $rand = rand(0,99999999);
        $rand = md5($rand);
        $imageName = $rand . '.png';
        $page->image=$imageName;
      }


        if ($page->save()) {
          if(isset($imageName)){
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
          }
            $status = 1;
        }

        $page = Page::with('parent_page')->get();
        return PageResource::collection($page);

    }

    public function destroy($id){
  // get menu.
        $page = Page::findOrFail($id);
        if ($page->delete()) {
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
