<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CourseCareerOutcome;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;
class CourseCareerOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $outcome = CourseCareerOutcome::with('course')->get();
        return Resource::collection($outcome);
    }

    public function store(Request $request)
    {
       	$status = 0;
    	$data['course_id'] = $request->input('course_id');
    	$data['description'] = $request->input('description');
        $create = CourseCareerOutcome::create($data);
    	if ($create) {
    		$status = 1;
    	}
        return new Resource($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseCareerOutcome  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */

    public function show($id){
    	 $outcome = CourseCareerOutcome::findOrFail($id);
        return new Resource($outcome);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseCareerOutcome  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCareerOutcome $courseCareerOutcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseCareerOutcome  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $status = 0;
        $outcome = CourseCareerOutcome::findOrFail($request->id);
        $outcome->course_id = $request->input('course_id');
        $outcome->description = $request->input('description');
        if ($outcome->save()) {
            $status = 1;
        }
        $outcome = CourseCareerOutcome::with('course')->get();
        return Resource::collection($outcome);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseCareerOutcome  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
     {
        // get menu.
        $outcome = CourseCareerOutcome::findOrFail($id);
        if ($outcome->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

}
