<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public $destination = 'public/files/';

    public function index()
    {
            $d = Download::all();
            return Resource::collection($d);
    }

    public function store(Request $request)
    {
        $d = new Download;
        $d->title = $request->input('title');
        $file = $request->file('file');
        $d->status = 1;
          if($file != null){
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $d->file = $filename;
            $file->move($this->destination,$filename);
        }
           $create = $d->save();
        if($create){
            $d = Download::all();
            return Resource::collection($d);
        }
    }

    public function show($id)
    {
    $d = Download::findOrFail($id);
        return new Resource($d);
    }

    public function edit(Request $request)
    {
        $d = Download::findOrFail($request->id);
        $d->title = $request->input('title');
        $d->status = $request->input('status');
        $file = $request->file('file');
        if($file != null){
            $oldimg = $d->file;
            $this->destroyimage($oldimg);
            $ext = $file->getClientOriginalExtension();
            $filename = md5(rand(0,999999)).'.'.$ext;
            $d->file = $filename;
            $file->move($this->destination,$filename);
        }
          if($d->save()){
            $d = Download::all();
            return Resource::collection($d);
        };

    }

     public function destroy($id)
    {
      $d = Download::findOrFail($id);
       $this->destroyimage($d->file);
        if ($d->delete()) {
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
