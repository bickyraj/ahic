<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CourseCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;

class CourseCategoryController extends Controller
{
  public $destination = 'public/images/course-categories/';
  public $images_dir = 'public/images/';

  public function __construct()
  {
      if (!is_dir($this->images_dir)) {
          mkdir($this->images_dir);
      }
      if (!is_dir($this->destination)) {
          mkdir($this->destination);
      }
  }

    public function index()
    {
        $categories = CourseCategory::orderBy('order_by','asc')->get();
        return Resource::collection($categories);
    }
    public function getCategory($id)
    {
        $categories = CourseCategory::where('id',$id)->orderBy('order_by','asc')->get();
        return Resource::collection($categories);
    }

    public function validator($request){
      $this->validate($request,[
        'name'=>'required',
      ],
      [
        'name.required' => 'Course category title is required',
      ]);
    }

public function getName($id){
    $category = CourseCategory::findOrFail($id);
    return new Resource($category) ;
}
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

        $category = new CourseCategory;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->order_by =1;
        $image = $request->image_background;
        $image_array_1 = explode(";", $image);

        if (array_key_exists("1", $image_array_1)) {
            $image_array_2 = explode(",", $image_array_1[1]);
            $imgdata = base64_decode($image_array_2[1]);
            $rand = rand(0, 99999999);
            $rand = md5($rand);
            $imageName = $rand . '.png';
            $category->image_background=$imageName;
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
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
        $category->description = $request->description;
        $image = $request->image_background;
        $image_array_1 = explode(";", $image);
        if (array_key_exists("1", $image_array_1)) {
            $oldimg = $category->image;
            $this->destroyimage($oldimg);
            $image_array_2 = explode(",", $image_array_1[1]);
            $imgdata = base64_decode($image_array_2[1]);
            $rand = rand(0, 99999999);
            $rand = md5($rand);
            $imageName = $rand . '.png';
            $category->image_background=$imageName;
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
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

    public function getCourseCategoryAndCourses()
    {
      $categories = CourseCategory::orderBy('order_by','asc')->with('courses')->get();
      return response()->json([
        'data' => $categories
      ]);
    }
}
