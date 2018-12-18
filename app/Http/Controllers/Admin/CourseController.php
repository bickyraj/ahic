<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public $destination = 'public/images/courses/';

    public function __construct(){
      if(is_dir($this->destination)){

      }else{
        mkdir($this->destination);
      }
    }
    
    public function index()
    {
         $course = Course::with('category')->get();
        return Resource::collection($course);
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
     $course = new Course;
        $course->name = $request->input('name');
        $course->course_category_id = $request->input('course_category_id');
        $course->video_link = $request->input('video_link');
        $course->duration = $request->input('duration');
        $course->study_method = $request->input('study_method');
        $course->description = $request->input('description');
        $course->order_by = $request->input('order_by');
        $course->onshore_fee = $request->input('onshore_fee');
        $course->offshore_fee = $request->input('offshore_fee');
        $file = $request->file('background_image');
        $course->status = 1;
        $course->order_by = 1;
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $course->background_image = $filename;
            $file->move($this->destination,$filename);
        }
        $create = $course->save();
        if($create){
        return new Resource($course);
        }

    }

    public function show($id)
    {
    $course = Course::findOrFail($id);
        return new Resource($course);
    }
    public function showByCategory($id){
     $courses = Course::where('course_category_id',$id)->get();
        return Resource::collection($courses);

    }

    public function showByCourse($id)
    {
    $course = Course::where('id',$id);
    if(count($course->get())>0){
        $course = $course->with('requirements','category','outcomes','assessment','rpl')->first();
        return new Resource($course);
    }
     else{
        return 'error';
    }

    }

   public function updateOrder(Request $request)
    {
        $status = 0;
        $data = $request->all();
        foreach ($data as $key => $value) {
            $menu = Course::find($value['id']);
            $menu->order_by = $key;
            if ($menu->save()) {
                $status = 1;
            }
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
           $status = 0;
        $id = $request->input('id');
        $course = Course::findOrFail($id);
        $course->course_category_id = $request->input('course_category_id');
        $course->name = $request->input('name');
        $course->video_link = $request->input('video_link');
        $course->duration = $request->input('duration');
        $course->study_method = $request->input('study_method');
        $course->description = $request->input('description');
        $course->onshore_fee = $request->input('onshore_fee');
        $course->offshore_fee = $request->input('offshore_fee');
        // $course->status = $request->input('status');
           $file = $request->file('background_image');
        if($file != null){
            $oldimg = $course->background_image;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $course->background_image = $filename;
            $file->move($this->destination,$filename);
        }
        if($course->save()){
         $courses = Course::with('category')->get();
        return Resource::collection($courses);
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$category)
    {
            $status = 0;
        $id = $request->id;
        $course = Course::findOrFail($id);
        $course->course_category_id = $request->input('course_category_id');
        $course->name = $request->input('name');
        $course->video_link = $request->input('video_link');
        $course->duration = $request->input('duration');
        $course->study_method = $request->input('study_method');
        $course->description = $request->input('description');
        $course->onshore_fee = $request->input('onshore_fee');
        $course->offshore_fee = $request->input('offshore_fee');
        // $course->status = $request->input('status');
           $file = $request->file('background_image');
        if($file != null){
            $oldimg = $course->background_image;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $course->background_image = $filename;
            $file->move($this->destination,$filename);
        }
        if($course->save()){
        $courses = Course::where('course_category_id',$category)->with('category')->get();
        return Resource::collection($courses);
        };
    }

     public function destroy($id)
    {
      $course = Course::findOrFail($id);
       $this->destroyimage($course->background_image);
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
