<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\CourseUnitCompetences;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;


class CourseUnitCompetencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CourseUnitCompetences::with('category')->get();
        return Resource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['course_unit_category_id'] = $request->input('course_unit_category_id');
        $data['unit_code'] = $request->input('unit_code');
        $data['description'] = $request->input('description');
         $create = CourseUnitCompetences::create($data);

        $categories = CourseUnitCompetences::with('category')->get();
        return Resource::collection($categories);
     
    }

    public function show($id)
    {
        $category = CourseUnitCompetences::findOrFail($id);
        return new Resource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseUnitCompetences  $courseunitcompetences
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseUnitCompetences $courseunitcompetences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseUnitCompetences  $courseunitcompetences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $status = 0;
        $id = $request->id;
        $category = CourseUnitCompetences::findOrFail($id);
        $category->course_unit_category_id = $request->course_unit_category_id;
        $category->unit_code = $request->unit_code;
        if($category->save()){
            $status =1;
        }
   $categories = CourseUnitCompetences::with('category')->get();
        return Resource::collection($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseUnitCompetences  $courseunitcompetences
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   $page = CourseUnitCompetences::findOrFail($id);
        if ($page->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
