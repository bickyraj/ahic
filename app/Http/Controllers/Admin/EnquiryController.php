<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Enquiry;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

class EnquiryController extends Controller
{
   public function index()
    {
        $enqs = Enquiry::all();
        return Resource::collection($enqs);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Enquiry::findOrFail($id);

        return new Resource($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$id)
     {
         $e = Enquiry::findOrFail($id);
         $e->status = $request->val;
         $e->save();
         $enqs = Enquiry::all();
         return Resource::collection($enqs);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get role.
        $role = Enquiry::findOrFail($id);
        $status = 0;
        if ($role->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
