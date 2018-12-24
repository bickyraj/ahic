<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

use App\ApplicationDateOfIntake;
use Illuminate\Http\Request;

class ApplicationDateOfIntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intakes  = ApplicationDateOfIntake::all();
        return Resource::collection($intakes);
    }
    public function form()
    {
        $intakes  = ApplicationDateOfIntake::groupBy('year')->get();
        return Resource::collection($intakes);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
           $intake['year'] = $request->input('year');
        $intake['term'] = $request->input('term');
        $intake['date'] = $request->input('date');
        $intake['end_date'] = $request->input('end_date');
        $intake['mid_term'] = $request->input('mid_term');
        $intake['duration'] = $request->input('duration');
        $intake['holiday_start'] = $request->input('holiday_start');
        $intake['holiday_end'] = $request->input('holiday_end');
        $intake['holiday_duration'] = $request->input('holiday_duration');
        $intake['credential_release'] = $request->input('credential_release');
        $create = ApplicationDateOfIntake::create($intake);
        if($create){
         $intakes  = ApplicationDateOfIntake::all();
        return Resource::collection($intakes);
        }
    }

    public function show($id)
    {
       $intake = ApplicationDateOfIntake::findOrFail($id);
       return new Resource($intake);
        //
    }

    public function getByYear($year)
    {
       $intake = ApplicationDateOfIntake::where('year',$year)->get();
       return Resource::collection($intake);
    }
    public function find($year,$date)
    {
       $intake = ApplicationDateOfIntake::where('year',$year)->where('date',$date)->first();
       return new Resource($intake);
    }


    public function edit(ApplicationDateOfIntake $applicationDateOfIntake)
    {
        //
    }


    public function update(Request $request)
    {
        $intake = ApplicationDateOfIntake::findOrFail($request->id);
        $intake->term = $request->input('term');
        $intake->year = $request->input('year');
        $intake->date = $request->input('date');
        $intake->end_date = $request->input('end_date');
        $intake->mid_term = $request->input('mid_term');
        $intake->duration = $request->input('duration');
        $intake->holiday_start = $request->input('holiday_start');
        $intake->holiday_end = $request->input('holiday_end');
        $intake->holiday_duration = $request->input('holiday_duration');
        $intake->credential_release = $request->input('credential_release');
        $intake->save();
                $intakes  = ApplicationDateOfIntake::all();
        return Resource::collection($intakes);

    }

    public function destroy($id)
    {
       $intake = ApplicationDateOfIntake::findOrFail($id);
       if($intake){
           $intake->delete();
                   $intakes  = ApplicationDateOfIntake::all();
        return Resource::collection($intakes);
       }
    }
}
