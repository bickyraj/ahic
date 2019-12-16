<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

use App\BranchLocation;
use App\Country;
use Illuminate\Http\Request;

class BranchLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = BranchLocation::with('country')->get();
        return Resource::collection($locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['country_id'] = $request->input('country_id');
        $data['location'] = $request->input('location');
        $data['status'] = 1;
        $creater = BranchLocation::create($data);
         $locations = BranchLocation::with('country')->get();
        return Resource::collection($locations);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BranchLocation  $branchLocation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location  = BranchLocation::findOrFail($id);
        return new Resource($location);
    }
    public function get($id)
    {
        $location  = BranchLocation::where('id',$id)->with('locations')->get();
        return new Resource($location);
    }

    public function getid($c){
      $location  = Country::where('name',$c)->first();
      return $location->id;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BranchLocation  $branchLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchLocation $branchLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BranchLocation  $branchLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $location  = BranchLocation::findOrFail($request->id);

         $data['country_id'] = $request->input('country_id');
        $data['location'] = $request->input('location');
        $data['status'] = $request->input('status');
        $creater = $location->update($data);
         $locations = BranchLocation::with('country')->get();
        return Resource::collection($locations);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BranchLocation  $branchLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location  = BranchLocation::findOrFail($id);
        $location->delete();
          $locations = BranchLocation::with('country')->get();
        return Resource::collection($locations);

        //
    }
}
