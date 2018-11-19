<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CourseEntryRequirement;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;
class CourseEntryRequirementController extends Controller
{
      public function index()
    {
     $outcome = CourseEntryRequirement::with('course')->get();
        return Resource::collection($outcome);
    }

    public function store(Request $request)
    {
       	$status = 0;
    	$data['course_id'] = $request->input('course_id');
    	$data['description'] = $request->input('description');
    	$data['order'] = $request->input('order');
        $create = CourseEntryRequirement::create($data);
    	if ($create) {
    		$status = 1;
    	}
        $outcome = CourseEntryRequirement::with('course')->get();
        return Resource::collection($outcome);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseEntryRequirement  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */

    public function show($id){
    	 $outcome = CourseEntryRequirement::findOrFail($id);
        return new Resource($outcome);
    }
    public function showByCourse($id){
    	 $outcome = CourseEntryRequirement::where('course_id',$id)->get();
        return new Resource($outcome);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseEntryRequirement  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseEntryRequirement $courseCareerOutcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseEntryRequirement  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $status = 0;
        $outcome = CourseEntryRequirement::findOrFail($request->id);
        $outcome->course_id = $request->input('course_id');
        $outcome->description = $request->input('description');
        $outcome->order = $request->input('order');
        if ($outcome->save()) {
            $status = 1;
        }
        $outcome = CourseEntryRequirement::with('course')->get();
        return Resource::collection($outcome);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseEntryRequirement  $courseCareerOutcome
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
     {
        // get menu.
        $outcome = CourseEntryRequirement::findOrFail($id);
        if ($outcome->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
