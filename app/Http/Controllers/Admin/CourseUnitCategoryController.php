<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\CourseUnitCategory;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;


class CourseUnitCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CourseUnitCategory::all();
        return Resource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['name'] = $request->input('name');
        $data['order_by'] = $request->input('order_by');
        $data['status'] ='1';
    $create = CourseUnitCategory::create($data);
            return new Resource($create);
    }

    public function show($id)
    {
        $category = CourseUnitCategory::findOrFail($id);
        return new Resource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseUnitCategory  $courseunitcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseUnitCategory $courseunitcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseUnitCategory  $courseunitcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $status = 0;
        $id = $request->id;
        $category = CourseUnitCategory::findOrFail($id);
        $category->name = $request->name;
        $category->order_by = $request->order_by;
        $category->status = $request->status;
        if($category->save()){
            $status =1;
        }
        return new Resource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseUnitCategory  $courseunitcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   $page = CourseUnitCategory::findOrFail($id);
        if ($page->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
