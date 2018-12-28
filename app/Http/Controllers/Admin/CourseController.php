<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public $destination = 'public/images/courses/';
    public $images_dir = 'public/images/';

    public function __construct(){
      if(!is_dir($this->images_dir)){
        mkdir($this->images_dir);
      }
      if(!is_dir($this->destination)){
        mkdir($this->destination);
      }
    }

    public function validator($request){
      $this->validate($request,[
        'name' =>' required',
        'video_link' =>' required',
        'duration' =>' required',
        'study_method' =>' required',
        'description' =>' required',
        'onshore_fee' =>' required',
        'offshore_fee' =>' required',
        'code' =>' required',
      ],
      [
        'name.required' =>'Course name is required',
        'video_link.required' =>' Course video link is required',
        'duration.required' =>' Course duration required',
        'study_method.required' =>'Course study method required',
        'description.required' =>'Course description required',
        'onshore_fee.required' =>'Course onshore fee required',
        'offshore_fee.required' =>'Course offshore fee required',
        'code.required' =>'Course code is required',
      ]);
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
      $this->validator($request);

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
        $course->code = $request->input('code');
        $course->status = 1;
        $course->order_by = 1;
        $image = $request->image;
       $image_array_1 = explode(";", $image);
       if (array_key_exists("1",$image_array_1)){
        $image_array_2 = explode(",", $image_array_1[1]);
        $imgdata = base64_decode($image_array_2[1]);
        $rand = rand(0,99999999);
        $rand = md5($rand);
        $imageName = $rand . '.png';
          $course->background_image=$imageName;
       }
        $create = $course->save();
        if($create){
          if(isset($imageName)){
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
          }
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
        $course->code = $request->input('code');
        // $course->status = $request->input('status');
        $image = $request->image;
      $image_array_1 = explode(";", $image);
      if (array_key_exists("1",$image_array_1)){
        $oldimg = $course->background_image;
        $this->destroyimage($oldimg);
        $image_array_2 = explode(",", $image_array_1[1]);
        $imgdata = base64_decode($image_array_2[1]);
        $rand = rand(0,99999999);
        $rand = md5($rand);
        $imageName = $rand . '.png';
        $course->background_image=$imageName;
      }
        if($course->save()){
          if(isset($imageName)){
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
          }
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
        $course->code = $request->input('code');
        $course->onshore_fee = $request->input('onshore_fee');
        $course->offshore_fee = $request->input('offshore_fee');
        // $course->status = $request->input('status');
        $image = $request->image;
      $image_array_1 = explode(";", $image);
      if (array_key_exists("1",$image_array_1)){
        $oldimg = $course->background_image;
        $this->destroyimage($oldimg);
        $image_array_2 = explode(",", $image_array_1[1]);
        $imgdata = base64_decode($image_array_2[1]);
        $rand = rand(0,99999999);
        $rand = md5($rand);
        $imageName = $rand . '.png';
        $course->background_image=$imageName;
      }

        if($course->save()){
          if(isset($imageName)){
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
          }
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
