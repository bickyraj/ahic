<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\AgentAgreementProcess;
use Illuminate\Http\Request;

class AgentAgreementProcessController extends Controller
{
    public $destination = 'public/images/processes/';

    public function validator($request){

            $this->validate($request,[
              'sent_date'=>'required',
              'signed'=>'required',
              'received_date'=>'required',
            ],
            [
              'sent_date.required'=>'Sent date is required.',
              'signed.required'=>'Signed is required.',
              'received_date.required'=>'Received date is required.',
            ]);
    }
    public function store(Request $request)
    {
      $this->validator($request);
            $data['agent_id'] = $request->input('agent_id');
            $data['agent_document_id'] = $request->input('agent_document_id');
            $data['sent_date'] = $request->input('sent_date');
            $data['received_date'] = $request->input('received_date');
            $data['signed'] = $request->input('signed');
                $agreement = $request->file('agreement');
          if($agreement != null){
            $ext = $agreement->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['agreement'] = $filename;
            $agreement->move($this->destination,$filename);
        }
        $creater = AgentAgreementProcess::create($data);
        return new Resource($creater);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AgentAgreementProcess  $agentAgreementProcess
     * @return \Illuminate\Http\Response
     */
    public function show(AgentAgreementProcess $agentAgreementProcess)
    {
        //
    }
    public function get($id)
    {
        $process = AgentAgreementProcess::findOrFail($id);
        return new Resource($process);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AgentAgreementProcess  $agentAgreementProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(AgentAgreementProcess $agentAgreementProcess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AgentAgreementProcess  $agentAgreementProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $process =  AgentAgreementProcess::findOrFail($id);
        $data['sent_date'] = $request->input('sent_date');
        $data['received_date'] = $request->input('received_date');
        $data['signed'] = $request->input('signed');

         $agreement = $request->file('agreement');
          if($agreement != null){
            $old = $process->agreement;
            $this->destroyimage($$old);
            $ext = $agreement->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['agreement'] = $filename;
            $agreement->move($this->destination,$filename);
        }
        $updater = $process->update($data);

    }

   public function destroy($id)
    {
      $course = AgentAgreementProcess::findOrFail($id);
       $this->destroyimage($course->agreement);
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
