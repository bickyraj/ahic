<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SliderController extends Controller
{
  public $destination = 'public/images/sliders/';
  public $images_dir = 'public/images/';

  public function __construct(){
    if (!is_dir($this->images_dir)) {
      mkdir($this->images_dir);
    }
    }

    public function index()
    {
        $s = Slider::all();
        return Resource::collection($s);
    }

    public function validator($request){
      $this->validate($request,
      [
        'title' =>'required',
        'sub_title' =>'required',
        'description' =>'required',
        'image' =>'required',
      ],
      [
        'title.required' =>'Slider title is required',
        'sub_title.required' =>'Slider sub title is required',
        'description.required' =>'Slider description is required',
        'image.required' =>'Slider image is required',
      ]);
    }

    public function store(Request $request)
    {
      $this->validator($request);
          $data['title'] = $request->input('title');
          $data['sub_title'] = $request->input('sub_title');
          $data['description'] = $request->input('description');
          $data['status'] = 1;
          $image = $request->image;
        $image_array_1 = explode(";", $image);
        if (array_key_exists("1",$image_array_1)){
            $image_array_2 = explode(",", $image_array_1[1]);
            $imgdata = base64_decode($image_array_2[1]);
            $rand = rand(0,99999999);
            $rand = md5($rand);
            $imageName = $rand . '.png';
            $data['image']=$imageName;
            $dir = $this->destination.$imageName;
            file_put_contents($dir, $imgdata);
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
        $image = $request->image;
      $image_array_1 = explode(";", $image);
      if (array_key_exists("1",$image_array_1)){
        $oldimg = $s->image;
        $this->destroyimage($oldimg);
        $image_array_2 = explode(",", $image_array_1[1]);
        $imgdata = base64_decode($image_array_2[1]);
        $rand = rand(0,99999999);
        $rand = md5($rand);
        $imageName = $rand . '.png';
        $data['image']=$imageName;
      }
     if($s->update($data)){
       if(isset($imageName)){
         $dir = $this->destination.$imageName;
         file_put_contents($dir, $imgdata);
       }
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
