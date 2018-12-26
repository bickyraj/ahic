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
use App\Slider;
use App\Cms as CMS;
use App\ApplicationDateOfIntake;


class HomeController extends Controller
{

  public function searchCourse(Request $request){
      $search =  $request->input('search_term');
      $results = Course::where('name','LIKE',"%$search%")->get();
      $categories = CourseCategory::all();
      return view('front.courses',compact('categories'))->with('courses',$results);
  }
    public function index()
    {
        $courses =    Course::with('category')->get();
        $countries =  Country::where('status','1')->get();
        $news  =      News::where('status','1')->limit(3)->get();
        $gallery =    Gallery::all();
        $sliders =    Slider::where('status','1')->get();
        $header = CMS::where('slug','header')->first();
        $lc = CMS::where('slug','lc')->first();
        $rc = CMS::where('slug','rc')->first();
        return view('front.index',compact('courses','countries','news','gallery','sliders','header','lc','rc'));
    }
    public function courses()
    {
        $courses = Course::with('category')->get();
        $categories = CourseCategory::all();
        return view('front.courses',compact('courses','categories'));
    }

    public function readMore(){
      $welcome = CMS::where('slug','welcome')->first();
      return view('front.readmore',compact('welcome'));
    }
    public function course($course){
      $name = str_replace('_', ' ', $course);
      $course = Course::where('name',$name)->with('category','requirements','outcomes','assessment','rpl','relation.competence','relation.category')->first();
      if($course){
      $payment = PaymentOption::all();
      $categories = CourseCategory::all();
      return view('front.course',compact('course','payment','categories'));
    }


    }
    public function courseCategory($category){
      $name = str_replace('_', ' ', $category);
      $catgs = CourseCategory::where('name',$name)->with('courses')->first();
      $categories = CourseCategory::all();
      return view('front.courseCat',compact('catgs','categories'));
    }

    public function admission(){
      $route =  \Request::segment(1);
      $page = Page::where('slug',$route)->get();
      if($page){
        $page = Page::where('slug',$route)->first()->id;
        $modules = PageModule::where('page_id',$page)->with('module','module.content')->get();
      }
      // $courses = Course::all();
      // $categories = CourseCategory::all();
      $intakeyear = ApplicationDateOfIntake::groupBy('year')->get();
      $intakes = ApplicationDateOfIntake::all();

      $courses = CourseCategory::with('courses')->get();
      // $this->debug($modules);
      return view('front.admission',compact('courses','categories','intakeyear','intakes','modules'));
    }
    public function studentService(){
      $route =  \Request::segment(1);
      $page = Page::where('slug',$route)->get();
      if($page){
        $page = Page::where('slug',$route)->first()->id;
      }
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
