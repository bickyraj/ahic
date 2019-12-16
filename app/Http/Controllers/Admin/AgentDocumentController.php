<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\AgentDocument;
use Illuminate\Http\Request;

class AgentDocumentController extends Controller
{
    public $destination = 'public/images/documents/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = AgentDocument::all();
        $doc = AgentDocument::with('process')->get();
        return Resource::collection($doc);
    }

    

    public function validator($request){

            $this->validate($request,[
              'company_name'=>'required',
              'location'=>'required',
              'address'=>'required',
              'country'=>'required',
            ],
            [
              'company_name.required'=>'Company Name is required.',
              'location.required'=>'Location is required.',
              'address.required'=>'Address is required.',
              'country.required'=>'Country is required.',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validator($request);

        $data['agent_id']  = $request->agent_id;
        $data['company_name'] = $request->company_name;
        $data['location'] = $request->location;
        $data['address'] = $request->address;
        $data['country'] = $request->country;
        $eoi = $request->file('EOI');
          if($eoi != null){
            $ext = $eoi->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['EOI'] = $filename;
            $eoi->move($this->destination,$filename);

        }
        $abn = $request->file('ABN');
          if($abn != null){
            $ext = $abn->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['ABN'] = $filename;
            $abn->move($this->destination,$filename);

        }
        $reference = $request->file('reference');
          if($reference != null){
            $ext = $reference->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['reference'] = $filename;
            $reference->move($this->destination,$filename);

        }
        $qualification = $request->file('qualification');
          if($qualification != null){
            $ext = $qualification->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['qualification'] = $filename;
            $qualification->move($this->destination,$filename);
        }
        $profile = $request->file('profile');
          if($profile != null){
            $ext = $profile->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['profile'] = $filename;
            $profile->move($this->destination,$filename);

        }
        $create = AgentDocument::create($data);
         if($create){
      $doc = AgentDocument::all();
        return Resource::collection($doc);
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AgentDocument  $agentDocument
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $course = AgentDocument::findOrFail($id);
        return new Resource($course);
    }
    public function get($id)
    {
          $course = AgentDocument::where('agent_id',$id)->with('process')->get();
        return new Resource($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AgentDocument  $agentDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $doc = AgentDocument::findOrFail($id);
         $data['company_name'] = $request->company_name;
        $data['location'] = $request->location;
        $data['address'] = $request->address;
        $data['country'] = $request->country;
        $eoi = $request->file('EOI');
          if($eoi != null){
              $old = $doc->EOI;
            $this->destroyimage($old);
            $ext = $eoi->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $course->EOI = $filename;
            $file->move($this->destination,$filename);

        }
        $abn = $request->file('ABN');
          if($abn != null){
                 $old = $doc->ABN;
            $this->destroyimage($old);
            $ext = $abn->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['ABN'] = $filename;
            $file->move($this->destination,$filename);

        }
        $reference = $request->file('reference');
          if($reference != null){
                 $old = $doc->reference;
            $this->destroyimage($old);
            $ext = $reference->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['reference'] = $filename;
            $file->move($this->destination,$filename);

        }
        $qualification = $request->file('qualification');
          if($qualification != null){
                 $old = $doc->qualification;
            $this->destroyimage($old);
            $ext = $qualification->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['qualification'] = $filename;
            $file->move($this->destination,$filename);

        }
        $profile = $request->file('profile');
          if($profile != null){
                 $old = $doc->profile;
            $this->destroyimage($old);
            $ext = $profile->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $$data['profile'] = $filename;
            $file->move($this->destination,$filename);

        }
        $updater = $doc->update($data);
         if($updater){
      $doc = AgentDocument::all();
        return Resource::collection($doc);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AgentDocument  $agentDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
 $id = $request->input('id');
        $doc = AgentDocument::findOrFail($id);
         $data['company_name'] = $request->input('company_name');
        $data['address'] = $request->input('address');
        $data['location'] = $request->input('location');
        $data['country'] = $request->input('country');
        $eoi = $request->file('EOI');
          if($eoi != null){
              $old = $doc->EOI;
            $this->destroyimage($old);
            $ext = $eoi->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['EOI'] = $filename;
            $eoi->move($this->destination,$filename);

        }
        $abn = $request->file('ABN');
          if($abn != null){
                 $old = $doc->ABN;
            $this->destroyimage($old);
            $ext = $abn->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['ABN'] = $filename;
            $abn->move($this->destination,$filename);

        }
        $reference = $request->file('reference');
          if($reference != null){
                 $old = $doc->reference;
            $this->destroyimage($old);
            $ext = $reference->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['reference'] = $filename;
            $reference->move($this->destination,$filename);

        }
        $qualification = $request->file('qualification');
          if($qualification != null){
                 $old = $doc->qualification;
            $this->destroyimage($old);
            $ext = $qualification->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['qualification'] = $filename;
            $qualification->move($this->destination,$filename);

        }
        $profile = $request->file('profile');
          if($profile != null){
                 $old = $doc->profile;
            $this->destroyimage($old);
            $ext = $profile->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['profile'] = $filename;
            $profile->move($this->destination,$filename);

        }
        $updater = $doc->update($data);
         if($updater){
      $doc = AgentDocument::all();
        return Resource::collection($doc);
        }

    }

   public function destroy($id)
    {
      $course = AgentDocument::findOrFail($id);
       $this->destroyimage($course->EOI);
       $this->destroyimage($course->ABN);
       $this->destroyimage($course->reference);
       $this->destroyimage($course->qualification);
       $this->destroyimage($course->profile);
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
