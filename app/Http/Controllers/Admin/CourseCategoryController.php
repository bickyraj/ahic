<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CourseCategory;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;

class CourseCategoryController extends Controller
{
  
    public function index()
    {
        $categories = CourseCategory::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseCategory $courseCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCategory  $courseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseCategory $courseCategory)
    {
        //
    }
}
