<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Menu as Resource;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return Resource::collection($newsletters);
    }

    public function destroy($id)
    {
      $newsletter = Newsletter::findOrFail($id);
      if($newsletter){
        $newsletter->delete();
      }
      $newsletters  = Newsletter::all();
      return Resource::collection($newsletters);
    }
}
