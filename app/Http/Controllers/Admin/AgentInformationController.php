<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\AgentInformation;
use App\ApplicationAgent;
use Illuminate\Http\Request;

class AgentInformationController extends Controller
{
    public $destination = 'public/images/agents/';
    public $images_dir = 'public/images/';

    public function __construct(){
      if(!is_dir($this->images_dir)){
        mkdir($this->images_dir);
      }
      if(!is_dir($this->destination)){
        mkdir($this->destination);
      }
    }

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
    public function validator($request){

            $this->validate($request,[
              'pan'=>'required',
              'first_name'=>'required',
              'last_name'=>'required',
              'telephone'=>'required',
              'mobile_no'=>'required',
              'email'=>'required',
              'address'=>'required',
              'start_date'=>'required',
              // 'image'=>'required',
            ],
            [
              'pan.required'=>'Registration Number is required.',
              'title.required'=>'Content Title is required.',
              'first_name.required'=>'First Name is required.',
              'last_name.required'=>'Last Name is required.',
              'telephone.required'=>'Telephone is required.',
              'mobile_no.required'=>'Mobile Number is required.',
              'email.required'=>'Email is required.',
              'address.required'=>'Address is required.',
              'start_date.required'=>'Start Date is required.',
            ]);
    }

    public function store(Request $request)
    {
$this->validator($request);
     $data['pan'] = $request->input('pan');
     $data['first_name'] = $request->input('first_name');
     $data['last_name'] = $request->input('last_name');
     $data['telephone'] = $request->input('telephone');
     $data['mobile_no'] = $request->input('mobile_no');
     $data['email'] = $request->input('email');
     $data['address'] = $request->input('address');
     $data['start_date'] = $request->input('start_date');
     $image = $request->logo;
   $image_array_1 = explode(";", $image);
   if (array_key_exists("1",$image_array_1)){
     $image_array_2 = explode(",", $image_array_1[1]);
     $imgdata = base64_decode($image_array_2[1]);
     $rand = rand(0,99999999);
     $rand = md5($rand);
     $imageName = $rand . '.png';
     $data['logo']=$imageName;
     $dir = $this->destination.$imageName;
     file_put_contents($dir, $imgdata);
   }
     $create = AgentInformation::create($data);
       $agents = AgentInformation::all();
       return Resource::collection($agents);
    }

    public function get($id)
    {
        $agent = AgentInformation::where('id',$id);
            if(count($agent->get())>0){
              $agent = $agent->with('documents.students.details');
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
      $this->validator($request);
      
        $agent = AgentInformation::findOrFail($request->id);
        $data['pan'] = $request->input('pan');
     $data['first_name'] = $request->input('first_name');
     $data['last_name'] = $request->input('last_name');
     $data['telephone'] = $request->input('telephone');
     $data['mobile_no'] = $request->input('mobile_no');
     $data['email'] = $request->input('email');
     $data['address'] = $request->input('address');
     $data['start_date'] = $request->input('start_date');
     $image = $request->logo;
   $image_array_1 = explode(";", $image);
   if (array_key_exists("1",$image_array_1)){
     $oldimg = $agent->logo;
     $this->destroyimage($oldimg);
     $image_array_2 = explode(",", $image_array_1[1]);
     $imgdata = base64_decode($image_array_2[1]);
     $rand = rand(0,99999999);
     $rand = md5($rand);
     $imageName = $rand . '.png';
     $data['logo']=$imageName;
     $dir = $this->destination.$imageName;
     file_put_contents($dir, $imgdata);
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
