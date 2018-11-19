<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Resources\Page as PageResource;


class PageController extends Controller
{
    public $destination = 'public/images/pages/';


    public function index(){
        $page = Page::with('parent_page')->get();
        return PageResource::collection($page);
    }
    public function show($id){
        $page = Page::findOrFail($id);
        return new PageResource($page);
    }

    public function store(Request $request){
        $status = 0;
        $data['name'] = $request->input('name');
        $data['parent_id'] = $request->input('parent_id');
        $data['sub_title'] = $request->input('sub_title');
        $data['sub_title'] = $request->input('sub_title');
        $data['description'] = $request->input('description');
        $data['status']=1;
         $file = $request->file('image');
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['image'] = $filename;
            $file->move($this->destination,$filename);
        }

        $data['slug'] = $this->create_slug_title($request->input('name'));
	$create = Page::create($data);

    	if ($create) {
    		$status = 1;
    	}
        return new PageResource($create);


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
                   $file = $request->file('background_image');
        if($file != null){
            $oldimg = $page->image;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $page->image = $filename;
            $file->move($this->destination,$filename);
        }

        if ($page->save()) {
            $status = 1;
        }

        return new PageResource($page);

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
