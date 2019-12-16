<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\CourseRpl;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;
class CourseRplController extends Controller
{
 public function index()
    {
          $outcome = CourseRpl::with('course')->get();
        return Resource::collection($outcome);
    }


     public function store(Request $request)
    {
       	$status = 0;
    	$data['course_id'] = $request->input('course_id');
    	$data['description'] = $request->input('description');
        $create = CourseRpl::create($data);
    	if ($create) {
    		$status = 1;
    	}
                $outcome = CourseRpl::with('course')->get();
        return Resource::collection($outcome);
    }

    
  public function show($id){
    	 $outcome = CourseRpl::findOrFail($id);
        return new Resource($outcome);
    }


   public function update(Request $request)
    {
         $status = 0;
        $outcome = CourseRpl::findOrFail($request->id);
        $outcome->course_id = $request->input('course_id');
        $outcome->description = $request->input('description');
        if ($outcome->save()) {
            $status = 1;
        }
        $outcome = CourseRpl::with('course')->get();
        return Resource::collection($outcome);

    }
       public function edit(Request $request){
             $outcome = CourseRpl::where('course_id',$request->course_id);
        $data['description'] = $request->input('description');
        $outcome->update($data);
    }


        public function destroy($id)
     {
        $outcome = CourseRpl::findOrFail($id);
        if ($outcome->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
