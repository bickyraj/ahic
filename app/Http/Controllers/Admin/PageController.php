<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Resources\Page as PageResource;


class PageController extends Controller
{
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
        $user = Page::findOrFail($request->id);
        $user->name = $request->input('name');
        $user->slug = $this->create_slug_title($request->input('name'));
        $user->parent_id = $request->input('parent_id');
        $user->description=$request->input('description');
        $user->sub_title=$request->input('sub_title');
        if ($user->save()) {
            $status = 1;
        }

        return new PageResource($user);

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

    
}
