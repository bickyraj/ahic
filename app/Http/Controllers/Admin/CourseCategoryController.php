<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CourseCategory;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;

class CourseCategoryController extends Controller
{
    public $destination = 'public/images/course_category/';
  
    public function index()
    {
        $categories = CourseCategory::orderBy('order_by','asc')->get();
        return Resource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new CourseCategory;
        $category->name = $request->input('name');
        $category->order_by = $request->input('order_by');
        $file = $request->file('image_background');
        $category->status = 1;
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $category->image_background = $filename;
            $file->move($this->destination,$filename);

        }
        $create = $category->save();
        if($create){
        return new Resource($category);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $category = CourseCategory::findOrFail($id);
        return new Resource($category);
    }

    public function update(Request $request)
    {
        $status = 0;
        $id = $request->id;
        $category = CourseCategory::findOrFail($id);
        $category->name = $request->name;
        $category->order_by = $request->order_by;
           $file = $request->file('image_background');
        if($file != null){
            $oldimg = $category->image_background;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $category->image_background = $filename;
            $file->move($this->destination,$filename);
        }
        if($category->update()){
        $categories = CourseCategory::orderBy('order_by','desc')->get();
        return Resource::collection($categories);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $page = CourseCategory::findOrFail($id);
       $this->destroyimage($page->image_background);
        if ($page->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
     public function updateOrder(Request $request)
    {
        $status = 0;
        $data = $request->all();
        foreach ($data as $key => $value) {
            $menu = CourseCategory::find($value['id']);
            $menu->order_by = $key;
            if ($menu->save()) {
                $status = 1;
            }
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
