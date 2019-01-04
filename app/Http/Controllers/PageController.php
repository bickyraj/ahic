<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
  public function slug($slug,$subslug=""){
    $page = Page::where('slug',$slug)->first();
    if($page){
      return view('front.slug',compact('page'));
    }
    else{
      return redirect()->route('home');
    }
  }
}
