<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Course;
use App\CourseCategory;
use App\PaymentOption;
use App\PageModule;
use App\AgentInformation;
use App\Country;
use App\Download;
use App\News;
use App\Gallery;


class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::with('category')->get();
        $countries = Country::all();
        $news  = News::where('status','1')->limit(3)->get();
        $gallery = Gallery::all();
        return view('front.index',compact('courses','countries','news','gallery'));
    }
    public function courses()
    {
        $courses = Course::with('category')->get();
        $categories = CourseCategory::all();
        return view('front.courses',compact('courses','categories'));
    }

    public function readMore(){
      return view('front.readmore');
    }
    public function course($course){
      $name = str_replace('_', ' ', $course);
      $course = Course::where('name',$name)->with('category','requirements','outcomes','assessment','rpl','relation.competence','relation.category')->first();
      $payment = PaymentOption::all();
      $categories = CourseCategory::all();
      return view('front.course',compact('course','payment','categories'));
    }
    public function courseCategory($category){
      $name = str_replace('_', ' ', $category);
      $catgs = CourseCategory::where('name',$name)->with('courses')->first();
      $categories = CourseCategory::all();
      return view('front.courseCat',compact('catgs','categories'));
    }

    public function admission(){
      $courses = Course::all();
      $categories = CourseCategory::all();
      return view('front.admission',compact('courses','categories'));
    }
    public function studentService(){
      $route =  \Request::segment(1);
      $page = Page::where('slug',$route)->first()->id;
      $modules = PageModule::where('page_id',$page)->with('module','module.content')->get();

      $courses = Course::all();
      $categories = CourseCategory::all();
      return view('front.studentservice',compact('courses','categories','modules'));
    }

    public function download(){
      $downloads = Download::all();
      return view('front.download',compact('downloads'));
    }
    public function contact(){
      return view('front.contact');
    }

    public function agents(){
      $agents = AgentInformation::with('documents')->get();
      // $this->debug($agents);
      return view('front.agents',compact('agents'));
    }

    public function debug($a){
      echo "<pre>";
      print_r($a->toArray());
      die();
    }
}
