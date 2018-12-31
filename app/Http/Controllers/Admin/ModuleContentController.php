<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\ModuleContent;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;

class ModuleContentController extends Controller
{
  public $destination = 'public/images/module/';
  public $images_dir = 'public/images/';

  public function __construct(){
    if(!is_dir($this->images_dir)){
      mkdir($this->images_dir);
    }
    if(!is_dir($this->destination)){
      mkdir($this->destination);
    }
  }
  public function index()
  {
    $modules = ModuleContent::with('module')->get();
    return Resource::collection($modules);
  }

  public function create()
  {

  }
  public function showByParent($id){
    $module = ModuleContent::where('module_id',$id);
    $module=  $module->with('module')->get();
    return Resource::collection($module);
  }


  public function store(Request $request,$id)
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
    $data['order_by'] = rand(0,9);
    $data['status'] = 1;
    // $file = $request->file('image');
    // if($file != null){
    //   $ext = $file->getClientOriginalExtension();
    //   $filename = md5(rand(0,999999)).'.'.$ext;
    //   $data['image'] = $filename;
    //   $file->move($this->destination,$filename);
    // }
    $create = ModuleContent::create($data);
    $modules = ModuleContent::where('module_id',$id)->with('module')->get();
    return Resource::collection($modules);
  }


  public function show($id)
  {
    $module_content = ModuleContent::findOrFail($id);
    return new Resource($module_content);
  }


  public function edit(Request $request,$modid)
  {
    $status = 0;
    $id = $request->input('id');
    $module_content = ModuleContent::findOrFail($id);
    $module_content->module_id = $request->module_id;
    $module_content->title = $request->title;
    $module_content->description = $request->description;
    $module_content->status = $request->status;
    $module_content->order_by = rand(0,9);
    // $file = $request->file('image');
    // if($file != null){
    //   $oldimg = $module_content->image;
    //   $this->destroyimage($oldimg);
    //   $ext = $file->getClientOriginalExtension();
    //   $filename = md5(rand(0,999999)).'.'.$ext;
    //   $module_content->image = $filename;
    //   $file->move($this->destination,$filename);
    // }
    if($module_content->update()){
      $module = ModuleContent::where('module_id',$modid);
      $module=  $module->with('module')->get();
      return Resource::collection($module);
    };
  }


  public function update(Request $request,$mo)
  {
    $status = 0;
    $id = $mo;
    $module_content = ModuleContent::findOrFail($id);
    $module_content->module_id = $request->input('module_id');
    $module_content->title = $request->input('title');
    $module_content->description = $request->input('description');
    $module_content->status = $request->input('status');
    $module_content->order_by = rand(0,9);
    // $file = $request->file('image');
    // if($file != null){
    //   $oldimg = $module_content->image;
    //   $this->destroyimage($oldimg);
    //   $ext = $file->getClientOriginalExtension();
    //   $filename = md5(rand(0,999999)).'.'.$ext;
    //   $module_content->image = $filename;
    //   $file->move($this->destination,$filename);
    // }
    if($module_content->update()){
      $modules = ModuleContent::where('module_id',$mo)->with('module')->get();
      return Resource::collection($modules);
    };
  }


  public function destroy($id)
  {
    $module_content = ModuleContent::findOrFail($id);
    $this->destroyimage($module_content->image);
    if ($module_content->delete()) {
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
