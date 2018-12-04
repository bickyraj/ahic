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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    }

 
    public function store(Request $request)
    {
           $intake['year'] = $request->input('year');
        $intake['date'] = $request->input('date');
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
        $intake->year = $request->input('year');
        $intake->date = $request->input('date');
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
