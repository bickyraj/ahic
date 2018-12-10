<?php

namespace App\Http\Controllers;
use Validator;
use App\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
    $validator =   Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required|numeric',
        'email' => 'required|email',
        'course_id' => 'required',
        'country_id' => 'required',
        'message' => 'required',
],
[
  'name.required'=>'Your name is required',
  'phone.required'=>'Contact number is required',
  'email.required'=>'Email is required',
  'email.email'=>'Valid Email Only!',
  'course_id.required'=>'Select A Course',
  'country_id.required'=>'Select Your Country',
  'message.required'=>'Enter your message',
  ])->validate();


      // if ($validator->fails())
      // {
      //     return response()->json(['errors'=>$validator->errors()->all()]);
      // }
      // return response()->json(['success'=>'Record is successfully added']);


          $data['name'] = $request->input('name');
          $data['phone'] = $request->input('phone');
          $data['email'] = $request->input('email');
          $data['course_id'] = $request->input('course_id');
          $data['country_id'] = $request->input('country_id');
          $data['status'] = 1;
          $data['message'] = $request->input('message');
          $creater = Enquiry::create($data);
          if($creater){
            return 'true';
          }
          else{
            return 'false';
          }

    }
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }
}
