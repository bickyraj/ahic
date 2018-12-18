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

     public function __construct(){
       if(is_dir($this->destination)){

       }else{
         mkdir($this->destination);
       }
     }
     
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
        public function showByParent($id){
        $module = ModuleContent::where('module_id',$id);
             $module=  $module->with('module')->get();
              return Resource::collection($module);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'module_id'=>'required',
            'description'=>'required',
            // 'image'=>'required',
        ],
    [
        'title.required'=>'Content Title is required.',
        'title.min'=>'Three chars min.',
        'title.required'=>'Content Title is required.',
        'module_id.required'=>'Select Any Module.',
        'description.required'=>'Description is required.',
        // 'image.required'=>'Choose An Image.',
    ]);
      $data['module_id'] = $request->input('module_id');
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['order_by'] = $request->input('order_by');
        $data['status'] = 1;
       $file = $request->file('image');
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['image'] = $filename;
            $file->move($this->destination,$filename);
        }
        $create = ModuleContent::create($data);
$modules = ModuleContent::with('module')->get();
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
        $course->order_by = $request->order_by;
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
     $modules = ModuleContent::with('module')->get();
        return Resource::collection($modules);
          };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModuleContent  $moduleContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$mo)
    {
             $status = 0;
        $id = $request->id;
        $course = ModuleContent::findOrFail($id);
         $course->module_id = $request->input('module_id');
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->status = $request->input('status');
        $course->order_by = $request->input('order_by');
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
       $modules = ModuleContent::where('module_id',$mo)->with('module')->get();
        return Resource::collection($modules);
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
