<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
  public $destination = 'public/images/sliders/';

    public function index()
    {
        $s = Slider::all();
        return Resource::collection($s);
    }

    public function store(Request $request)
    {
          $data['title'] = $request->input('title');
          $data['sub_title'] = $request->input('sub_title');
          $data['description'] = $request->input('description');
          $image = $request->file('image');
      if($image)
      {
        $ext = $image->getClientOriginalExtension();
        $filename = md5(rand(0,999999)).'.'.$ext;
        $data['image'] = $filename;
        $image->move($this->destination,$filename);
      }
         Slider::create($data);
         $s = Slider::all();
         return Resource::collection($s);

     }


    public function show($id)
    {
          $s = Slider::findOrFail($id);
          return new Resource($s);
    }

    public function edit(Slider $slider)
    {
        //
    }

    public function updateOrder(Request $request)
     {
         $status = 0;
         $data = $request->all();
         foreach ($data as $key => $value) {
             $menu = Slider::find($value['id']);
             $menu->order_by = $key;
             if ($menu->save()) {
                 $status = 1;
             }
         }
         return response()->json([
             'status' => $status,
         ]);
     }


    public function update(Request $request)
    {
        $id = $request->id;

        $s = Slider::findOrFail($id);
        $data['title'] = $request->input('title');
        $data['sub_title'] = $request->input('sub_title');
        $data['description'] = $request->input('description');
        $data['status'] = $request->input('status');
        $file = $request->file('image');
     if($file != null){
         $oldimg = $s->image;
         $this->destroyimage($oldimg);
         $ext = $file->getClientOriginalExtension();
         $filename = md5(rand(0,999999)).'.'.$ext;
         $data['image']= $filename;
         $file->move($this->destination,$filename);
     }
     if($s->update($data)){
       $s = Slider::all();
       return Resource::collection($s);
     }

    }


    public function destroy($id)
   {
     $s = Slider::findOrFail($id);
      $this->destroyimage($s->image);
       if ($s->delete()) {
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
