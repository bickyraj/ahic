<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public $destination = 'public/images/gallery/';
    public function __construct()
    {
        if (is_dir($this->destination)) {
        } else {
            mkdir($this->destination);
        }
    }

    public function index()
    {
        $g = Gallery::with('gallery_category')->get();
        return response()->json([
            'data' => $g
        ]);
    }



    public function store(Request $request)
    {
        $file = $request->file('image');
        foreach ($file as $image) {
            $ext = $image->getClientOriginalExtension();
            $filename = md5(rand(0, 999999)).'.'.$ext;
            $data['image'] = $filename;
            $image->move($this->destination, $filename);
            $data['gallery_category_id'] = $request->gallery_category_id;
            Gallery::create($data);
        }
        $g = Gallery::with('gallery_category')->get();
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

    public function destroyimage($image)
    {
        $oldimg = $this->destination.$image;
        if (file_exists($oldimg)) {
            @unlink($oldimg);
        }
    }

    public function changeCategory(Request $request, $id)
    {
        $status = 0;
        $gallery = Gallery::findOrFail($id);
        $gallery->gallery_category_id = $request->gallery_category_id;

        if ($gallery->save()) {
            $status = 1;
        }

        return response()->json([
            'status' => $status,
            'data' => $gallery
        ]);
    }
}
