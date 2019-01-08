<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\PageModule;

class PageController extends Controller
{
  public function slug($slug,$subslug=""){
    if ($subslug != "") {
      $page = Page::where('slug',$subslug)->first();
      if($page){
        $page = Page::where('slug',$slug)->first();
        if($page){
          $modules = PageModule::where('page_id',$page->id)->with('module','module.content')->get();
          return view('front.slug',compact('page','modules'));
        }
        else{
          return redirect()->route('home');
        }
      }
      else{
        return redirect()->route('home');
      }
    }
    $page = Page::where('slug',$slug)->first();
    if($page){
      $modules = PageModule::where('page_id',$page->id)->with('module','module.content')->get();
      return view('front.slug',compact('page','modules'));
    }
    else{
      return redirect()->route('home');
    }
  }
}
