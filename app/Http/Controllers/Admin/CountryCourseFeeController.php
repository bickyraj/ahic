<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;

use App\CountryCourseFee;
use Illuminate\Http\Request;

class CountryCourseFeeController extends Controller
{

    public function store(Request $request)
    {
      $data['country_id'] = $request->input('country_id');
      $data['course_id'] = $request->input('course_id');
      $data['fee'] = $request->input('fee');
      CountryCourseFee::create($data);

      $ccfs = CountryCourseFee::all();
      return Resource::collection($ccfs);
    }

    public function getCCF($id){
        $ccfs = CountryCourseFee::where('course_id',$id)->with('country')->get();
        return Resource::collection($ccfs);
    }
    public function show($id){
        $ccfs = CountryCourseFee::findOrFail($id)->first();
        return new Resource($ccfs);
    }

    public function update(Request $request)
    {
      $updater = CountryCourseFee::findOrFail($request->id);
      $data['country_id'] = $request->input('country_id');
      $data['course_id'] = $request->input('course_id');
      $data['fee'] = $request->input('fee');
      $updater->update($data);
    }

    public function destroy($id)
    {
      $deleter = CountryCourseFee::findOrFail($id);
        if ($deleter) {
          $deleter->delete();
        }
    }
}
