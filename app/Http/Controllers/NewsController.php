<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function news()
    {
        $news = News::where('status','1')->orderBy('date','desc')->get();
        $latest = News::orderBy('date','desc')->limit(3)->get();
        return view('front.news',compact('news','latest'));
    }

    public function singleNews($news)
    {
        $slug = str_replace('_', ' ', $news);
        $news = News::where('title',$slug)->first();
        if($news){
          $news = News::where('title',$slug)->first();
          $latest = News::orderBy('date','desc')->limit(3)->get();
          return view('front.singleNews',compact('news','latest'));
        }
        else{
          return redirect()->route('news');
        }

    }


}
