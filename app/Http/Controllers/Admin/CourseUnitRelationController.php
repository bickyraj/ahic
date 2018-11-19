<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\CourseUnitRelation;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;

class CourseUnitRelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relations = CourseUnitRelation::with('competence','course','category')->get();
        return Resource::collection($relations);
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
       $status = 0;
    	$data['course_unit_category_id'] = $request->input('course_unit_category_id');
    	$data['course_unit_competence_id'] = $request->input('course_unit_competence_id');
    	$data['course_id'] = $request->input('course_id');
        $create = CourseUnitRelation::create($data);
    	if ($create) {
    		$status = 1;
    	}
        return new Resource($create);
    }

    public function show($id)
    {
 $category = CourseUnitRelation::findOrFail($id);
        return new Resource($category);
    }

        public function showByCourse($id)
    {
         $competence = CourseUnitRelation::where('course_id',$id)->with('category','competence')->get();
        return new Resource($competence);
    }


public function update(Request $request){
    	$status = 0;
        $updater = CourseUnitRelation::findOrFail($request->id);
        $updater->course_unit_category_id = $request->input('course_unit_category_id');
        $updater->course_unit_competence_id = $request->input('course_unit_competence_id');
        $updater->course_id = $request->input('course_id');
        
        if ($updater->save()) {
            $status = 1;
        }
        return new Resource($updater);

    }

   public function destroy($id)
    {
      $outcome = PageModule::findOrFail($id);
        if ($outcome->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
