<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Module;
use Illuminate\Http\Request;


class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return Resource::collection($modules);
    }

public function validator($request){
  $this->validate($request,[
    'title' => 'required',
    'display_type' =>'required',
  ],
  [
    'title.required' => 'Module title is required',
    'display_type.required' => 'Display type is required',
  ]
);
}

    public function store(Request $request)
    {
      $this->validator($request);

        $data['title'] = $request->input('title');
            $data['display_type'] = $request->input('display_type');
            $data['status'] = 1;
        $create = Module::create($data);
             $modules = Module::all();
        return Resource::collection($modules);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  $category = Module::findOrFail($id);
        return new Resource($category);
    }

    /**
     * Show the form for editinmg the specified resource.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    $status = 0;
        $id = $request->id;
        $category = Module::findOrFail($id);
        $category->title = $request->title;
        $category->display_type = $request->display_type;
        $category->status = $request->status;
        if($category->save()){
            $status =1;
        }
        $categories = Module::all();
        return Resource::collection($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $outcome = Module::findOrFail($id);
        if ($outcome->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
