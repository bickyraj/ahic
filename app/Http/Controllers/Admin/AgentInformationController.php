<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\AgentInformation;
use Illuminate\Http\Request;

class AgentInformationController extends Controller
{
    public $destination = 'public/images/agents/';

    public function index()
    {
       $agents = AgentInformation::with('documents')->get();
       foreach ($agents as $agent) {
         //for each agents as agent
          if($agent->documents != null){
            //checking if agent has company
              foreach ($agent->documents as $shore) {
                //if agent has more than one company
                if(count($agent->documents) < 2){
                  //if has only one check for the shore
                                  if($shore->country == "Australia"){
                                    $agent->shore = "on";
                                  }
                                  else{
                                    $agent->shore = "off";
                                  }
                                }
                else{
                  //if has multiple company
                  $on = "";
                  $off="";
                  $agent->count = count($agent->documents);
                  for ($i=0; $i < $agent->count ; $i++) {
                    //checking every document in loop and storing
                    if($agent->documents[$i]->country == "Australia"){
                      $on ="1";
                    }
                    else{
                      $off="1";
                    }
                  }
                  //if the agent has company in both on shore and offshore
                                if($off == "1" && $on =="1"){
                                  $agent->shore = "all";
                                }
                                else{
                                  // else
                                  if($shore->country == "Australia"){
                                    $agent->shore = "on";
                                  }
                                  else{
                                    $agent->shore = "off";
                                  }
                                }

                }
              }
              unset($agent->documents);
              //remove documents cause we dont need
          }
       }
       return Resource::collection($agents);
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
     $data['pan'] = $request->input('pan');
     $data['first_name'] = $request->input('first_name');
     $data['last_name'] = $request->input('last_name');
     $data['telephone'] = $request->input('telephone');
     $data['mobile_no'] = $request->input('mobile_no');
     $data['email'] = $request->input('email');
     $data['address'] = $request->input('address');
     $data['start_date'] = $request->input('start_date');
     $file = $request->file('logo');
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['logo'] = $filename;
            $file->move($this->destination,$filename);
        }
     $create = AgentInformation::create($data);
       $agents = AgentInformation::all();
       return Resource::collection($agents);
    }

    public function get($id)
    {
        $agent = AgentInformation::where('id',$id);
            if(count($agent->get())>0){
        $agent = $agent->first();
        return new Resource($agent);
    }
     else{
        return 'error';
    }

    }
    public function show($id)
    {
        $agent = AgentInformation::findOrFail($id);
        return new Resource($agent);


    }


    public function edit(AgentInformation $agentInformation)
    {
        //
    }


    public function update(Request $request)
    {
        $agent = AgentInformation::findOrFail($request->id);
        $data['pan'] = $request->input('pan');
     $data['first_name'] = $request->input('first_name');
     $data['last_name'] = $request->input('last_name');
     $data['telephone'] = $request->input('telephone');
     $data['mobile_no'] = $request->input('mobile_no');
     $data['email'] = $request->input('email');
     $data['address'] = $request->input('address');
     $data['start_date'] = $request->input('start_date');
     $file = $request->file('logo');
        if($file != null){
          $oldimg = $agent->logo;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['logo'] = $filename;
            $file->move($this->destination,$filename);
        }
     $updater = $agent->update($data);
       $agents = AgentInformation::all();
       return Resource::collection($agents);
    }


    public function destroy($id)
    {
      $course = AgentInformation::findOrFail($id);
       $this->destroyimage($course->image);
        if ($course->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

    public function destroyimage($image){
        $oldimg = $this->destination.$image;
        if(file_exists($oldimg)){
            @unlink($oldimg);
        }
    }

}
