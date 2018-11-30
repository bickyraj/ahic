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
        $year =[];
        $n =0;
        foreach($intakes as $intake){
            $year['year'][$n]= $intake['year'];
            $n++;
        }
        $year = array_unique($year['year']);
        // $year =  (object) $year;
        return $year;
        // return Resource::collection($year);
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
     * @param  \App\ApplicationDateOfIntake  $applicationDateOfIntake
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationDateOfIntake $applicationDateOfIntake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationDateOfIntake  $applicationDateOfIntake
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplicationDateOfIntake $applicationDateOfIntake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationDateOfIntake  $applicationDateOfIntake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationDateOfIntake $applicationDateOfIntake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationDateOfIntake  $applicationDateOfIntake
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplicationDateOfIntake $applicationDateOfIntake)
    {
        //
    }
}
