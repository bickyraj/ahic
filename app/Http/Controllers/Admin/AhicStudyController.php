<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\Menu as Resource;
use App\Http\Controllers\Controller;
use App\AhicStudy;

class AhicStudyController extends Controller
{
    public $destination = 'public/images/ahic-studies/';
    public $images_dir = 'public/images/';

    public function __construct()
    {
        if (!is_dir($this->images_dir)) {
            mkdir($this->images_dir);
        }
        if (!is_dir($this->destination)) {
            mkdir($this->destination);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = AhicStudy::paginate(20);
        return Resource::collection($t);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' =>'Name is required',
            'description.required' =>'Description is required',
        ]);

        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['link'] = $request->input('link');

        $image = $request->image;
        $image_array_1 = explode(";", $image);
        if (array_key_exists("1", $image_array_1)) {
            $image_array_2 = explode(",", $image_array_1[1]);
            $imgdata = base64_decode($image_array_2[1]);
            $rand = rand(0, 99999999);
            $rand = md5($rand);
            $imageName = $rand . '.png';
            $data['icon_name']=$imageName;
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
        }

        $creater = AhicStudy::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $t = AhicStudy::findOrFail($id);
        return new Resource($t);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        Log::info($request->all());
        $t = AhicStudy::findOrFail($request->id);

        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['link'] = $request->input('link');
        //image
        $image = $request->image;
        $image_array_1 = explode(";", $image);
        if (array_key_exists("1", $image_array_1)) {
            $oldimg = $t->image;
            $this->destroyimage($oldimg);
            $image_array_2 = explode(",", $image_array_1[1]);
            $imgdata = base64_decode($image_array_2[1]);
            $rand = rand(0, 99999999);
            $rand = md5($rand);
            $imageName = $rand . '.png';
            $data['icon_name']=$imageName;
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
        }
        $t->update($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $t = AhicStudy::findOrFail($request->id);
        $data['status'] = $request->status;
        $t->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $t = AhicStudy::findOrFail($id);
        if ($t) {
            $this->destroyimage($t->icon_name);
            $t->delete();
        }
    }

    public function destroyimage($image)
    {
        $oldimg = $this->destination.$image;
        if (file_exists($oldimg)) {
            @unlink($oldimg);
        }
    }
}
