<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

use App\Http\Resources\Menu as MenuResource;


class MenuController extends Controller
{
  public function index(){
      $menu = Menu::with('parent_menu','parent_page')->orderBy('menu_order','asc')->get();
        return MenuResource::collection($menu);
    }

    public function show($id){
    	 $menu = Menu::findOrFail($id);
        return new MenuResource($menu);
    }

    public function validator($request){
      $this->validate($request,[
        'name'=>'required',
      ],
      [
        'name.required'=>'Menu name is required',
      ]
    );
    }

    public function store(Request $request){
      $this->validator($request);
    	$status = 0;
    	$data['name'] = $request->input('name');
    	$data['parent_id'] = $request->input('parent_id');
    	$data['page_id'] = $request->input('page_id');
    	$data['menu_order'] = rand(0,9);
    	$data['status'] =1;
    	$data['count'] =0;
        $create = Menu::create($data);
    	if ($create) {
    		$status = 1;
    	}
      $menu = Menu::with('parent_menu','parent_page')->orderBy('menu_order','asc')->get();
        return MenuResource::collection($menu);

    }



    public function update(Request $request){
    	$status = 0;
        $user = Menu::findOrFail($request->id);
        $user->name = $request->input('name');
        $user->parent_id = $request->input('parent_id');
        $user->page_id = $request->input('page_id');

        if ($user->save()) {
            $status = 1;
        }
        $menu = Menu::with('parent_menu','parent_page')->orderBy('menu_order','asc')->get();
          return MenuResource::collection($menu);

    }

    public function destroy($id)
     {
        // get menu.
        $menu = Menu::findOrFail($id);
        if ($menu->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }

     public function updateOrder(Request $request)
    {
        $status = 0;
        $data = $request->all();
        foreach ($data as $key => $value) {
            $menu = Menu::find($value['id']);
            $menu->menu_order = $key;
            if ($menu->save()) {
                $status = 1;
            }
        }
        return response()->json([
            'status' => $status,
        ]);
    }

}
