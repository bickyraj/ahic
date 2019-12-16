<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgentInformation;
use App\ApplicationAgent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class AgentInformationController extends Controller
{
	public function validator($request)
	{
	    $this->validate(
	        $request,
	        [
	            'pan'=>'required',
	            'first_name'=>'required',
	            'last_name'=>'required',
	            'telephone'=>'required',
	            'mobile_no'=>'required',
	            'email'=>'required|email',
	            'address'=>'required',
	            'start_date'=>'required',
	        ],
	        [
	            'pan.required'=>'Registration Number is required.',
	            'title.required'=>'Content Title is required.',
	            'first_name.required'=>'First Name is required.',
	            'last_name.required'=>'Last Name is required.',
	            'telephone.required'=>'Telephone is required.',
	            'mobile_no.required'=>'Mobile Number is required.',
	            'email.required'=>'Email is required.',
	            'email.email'=>'Valid email is required.',
	            'address.required'=>'Address is required.',
	            'start_date.required'=>'Start Date is required.',
	        ]
	    );
	}

	public function store(Request $request)
	{
		$status = 0;
	    $this->validator($request);
	    $agent = new AgentInformation;
	    $agent->pan = $request->input('pan');
	    $agent->first_name = $request->input('first_name');
	    $agent->last_name = $request->input('last_name');
	    $agent->telephone = $request->input('telephone');
	    $agent->mobile_no = $request->input('mobile_no');
	    $agent->email = $request->input('email');
	    $agent->address = $request->input('address');
	    $agent->start_date = $request->input('start_date');
	    $agent->agent_request = 2;

	    if ($request->hasFile('logo')) {
	        $imageName = $request->logo->getClientOriginalName();
	        $imageSize = $request->logo->getClientSize();
	        $imageType = $request->logo->getClientOriginalExtension();
	        $imageNameUniqid = md5($imageName . microtime()) . '.' . $imageType;
	        $imageName = $imageNameUniqid;

	        $agent->logo = $imageName;
	    }

	    if ($agent->save()) {
	    	if ($request->hasFile('logo')) {

	    	    $image_quality = 100;

	    	    if (($imageSize/1000000) > 1) {
	    	        $image_quality = 75;
	    	    }

	    	    $path = 'public/images/agents/';

	    	    $image = Image::make($request->logo);

	    	    Storage::put($path . $agent['id'] . '/' . $imageName, (string) $image->encode('jpg', $image_quality));

	    	    $status = 1;
	    	}
	    }

        session()->flash('success_message', 'Your request has been sent.');
	    return redirect()->route('agents');
	}
}
