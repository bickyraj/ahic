<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
  public function slug($slug,$subslug=""){

    // if ($subslug =='') {
      $page = Page::where('slug',$slug)->first();
      if ($page) {
        // if($slug == 'course'){
        //   return redirect()->route('course');
        // }
        // if($slug == 'admission'){
        //   return redirect()->route('admission');
        // }
      }
      else{
        return redirect()->route('home');
      }
  }
}
