<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $destination = 'public/images/gallery/';

    public function index()
    {
        $g = Gallery::all();
        return Resource::collection($g);
    }

  
   
    public function store(Request $request)
    {
             $file = $request->file('image');
             foreach($file as $image){
            $ext = $image->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['image'] = $filename;
            $image->move($this->destination,$filename);
            Gallery::create($data);
             }
                   $g = Gallery::all();
        return Resource::collection($g);
         
    }

 
    public function show(Gallery $gallery)
    {
    }

        public function destroy($id)
    {
      $gallery = Gallery::findOrFail($id);
       $this->destroyimage($gallery->image);
        if ($gallery->delete()) {
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
