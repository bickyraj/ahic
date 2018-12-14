<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $destination = 'public/images/news/';

    public function index()
    {
        $n = News::orderBy('order_by','asc')->get();
        return Resource::collection($n);
    }


    public function store(Request $request)
    {
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['date'] = $request->input('date');
        $file = $request->file('image');
        if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['image'] = $filename;
            $file->move($this->destination,$filename);
        }
        $create = News::create($data);
        if($create){
        $n = News::orderBy('order_by','asc')->get();
        return Resource::collection($n);
        }
    }

 
    public function show($id)
    {
        $n = News::findOrFail($id);
        return new Resource($n);
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $news = News::findOrFail($id);
        $data['title'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        $data['date'] = $request->input('date');
        $file = $request->file('image');
        if($file != null){
            $oldimg = $news->image;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $data['image'] = $filename;
            $file->move($this->destination,$filename);
        }
        $update = $news->update($data);
        if($update){
             $n = News::orderBy('order_by','asc')->get();
        return Resource::collection($n);
        }


    }
     public function destroy($id)
    {
      $news = News::findOrFail($id);
       $this->destroyimage($news->image);
        if ($news->delete()) {
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
