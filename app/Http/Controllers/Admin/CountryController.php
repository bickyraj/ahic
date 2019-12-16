<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $countries  = Country::with('locations')->get();
    return Resource::collection($countries);
  }

  public function store(Request $request)
  {
    $data['name'] = $request->input('name');
    $data['status'] = 1;
    $creater = Country::create($data);
    $countries  = Country::all();
    return Resource::collection($countries);
  }


  public function show($id)
  {
    $country = Country::findOrFail($id);
    return new Resource($country);
  }

  public function update(Request $request)
  {
    $country = Country::findOrFail($request->id);
    $data['name'] = $request->input('name');
    $data['status'] = $request->input('status');
    $updater = $country->update($data);
    if($updater){
      $countries  = Country::all();
      return Resource::collection($countries);
    }
  }

  public function destroy($id)
  {
    $country = Country::findOrFail($id);
    if($country){
      $country->delete();
    }
    $countries  = Country::all();
    return Resource::collection($countries);
  }
}
