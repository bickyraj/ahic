<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\PageModule;
use Illuminate\Http\Request;

use App\Http\Resources\Menu as Resource;

class PageModuleController extends Controller
{

    public function index()
    {
         $modules = PageModule::with('page','module')->get();
        return Resource::collection($modules);
    }

    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $status = 0;
    	$data['module_id'] = $request->input('module_id');
    	$data['page_id'] = $request->input('page_id');
    	$data['order_by'] = $request->input('order_by');
    	$data['status'] =1;
        $create = PageModule::create($data);
    	if ($create) {
    		$status = 1;
    	}
        return new Resource($create);
    }

    public function show($id)
    {
        $category = PageModule::findOrFail($id);
        return new Resource($category);
    }

    public function showByPage($id){
        $module = PageModule::where('page_id',$id);
             $module=  $module->with('module')->get();
              return new Resource($module);
    }


    public function edit(PageModule $pageModule)
    {
        //
    }

public function update(Request $request){
    	$status = 0;
        $updater = PageModule::findOrFail($request->id);
        $updater->module_id = $request->input('module_id');
        $updater->page_id = $request->input('page_id');
        $updater->order_by = $request->input('order_by');
        
        if ($updater->save()) {
            $status = 1;
        }
        return new Resource($updater);

    }

   public function destroy($id)
    {
      $outcome = PageModule::findOrFail($id);
        if ($outcome->delete()) {
            $status = 1;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
