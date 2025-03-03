<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;


use App\ApplicationForm;
use Illuminate\Http\Request;

class ApplicationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $applications = ApplicationForm::with('edu')->orderBy('created_at','DESC')->paginate(1);
        $applications = ApplicationForm::with('edu')->get();
        return Resource::collection($applications);
    }


    public function fetch($id){
            // $application = ApplicationForm::find($id)->with('edu','date_of_intake','fee','services','application_course.course','passport','aus','home','econtact','english','rpl','services','checklist','underage')->first();
            $application = ApplicationForm::where('id',$id)->with('edu','date_of_intake','fee','services','application_course.course','passport','aus','home','econtact','english','rpl','services','checklist','underage')->first();
            return new Resource($application);
    }
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
     * @param  \App\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function show(ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id)
     {
         $e = ApplicationForm::findOrFail($id);
         $e->status = $request->val;
         $e->save();
         $applications = ApplicationForm::with('edu')->get();
         return Resource::collection($applications);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplicationForm $applicationForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApplicationForm  $applicationForm
     * @return \Illuminate\Http\Response
     */
       public function destroy($id)
        {
            // get role.
            $role = ApplicationForm::findOrFail($id);
            $status = 0;
            if ($role->delete()) {
                $status = 1;
            }

            $applications = ApplicationForm::with('edu')->get();
            return Resource::collection($applications);
          }

}
