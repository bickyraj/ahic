<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\GalleryCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\Role as Resource;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = GalleryCategory::paginate(15);

        // return collection of category as a resource.
        return Resource::collection($category);
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
        $validatedData = $request->validate([
            'name' => 'required|unique:gallery_categories|max:255',
        ]);
        
        $status = 0;
        $category = new GalleryCategory;
        $category->name = $request->input('name');

        if ($category->save()) {
            $status = 1;
        }

        return new Resource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = GalleryCategory::findOrFail($id);

        // return single category as resource.
        return new Resource($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $status = 0;

        $category = GalleryCategory::findOrFail($request->id);
        $category->id = $request->input('id');
        $category->name = $request->input('name');

        if ($category->save()) {
            $status = 1;
        }

        return new Resource($category);
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
        // get category.
        $status = 0;
        if ($id != 1) {
            $category = GalleryCategory::findOrFail($id);
            if ($category->delete()) {
                $status = 1;
            }
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
