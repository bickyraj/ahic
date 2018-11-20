<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ModuleContent;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;

class ModuleContentController extends Controller
{
    public $destination = 'public/images/module/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
$modules = ModuleContent::with('module')->get();
        return Resource::collection($modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data['module_id'] = $request->input('module_id');
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['status'] = 1;
       $file = $request->file('image');
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['image'] = $filename;
            $file->move($this->destination,$filename);
        }
        $create = ModuleContent::create($data);
             $modules = ModuleContent::all();
        return Resource::collection($modules);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModuleContent  $moduleContent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $course = ModuleContent::findOrFail($id);
        return new Resource($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModuleContent  $moduleContent
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         $status = 0;
        $id = $request->input('id');
        $course = Course::findOrFail($id);
        $course->module_id = $request->module_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->status = $request->status;
           $file = $request->file('image');
        if($file != null){
            $oldimg = $course->image;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $course->image = $filename;
            $file->move($this->destination,$filename);
        }
        if($course->update()){
         $courses = ModuleContent::all();
        return Resource::collection($courses);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModuleContent  $moduleContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
             $status = 0;
        $id = $request->id;
        $course = ModuleContent::findOrFail($id);
         $course->module_id = $request->module_id;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->status = $request->status;
           $file = $request->file('image');
        if($file != null){
            $oldimg = $course->image;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $course->background_image = $filename;
            $file->move($this->destination,$filename);
        }
        if($course->update()){
         $course = ModuleContent::all();
       
        return Resource::collection($course);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModuleContent  $moduleContent
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
      $course = ModuleContent::findOrFail($id);
       $this->destroyimage($course->image);
        if ($course->delete()) {
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
