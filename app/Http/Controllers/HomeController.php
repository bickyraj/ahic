<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Course;
use App\CourseCategory;
use App\PaymentOption;
use App\PageModule;
use App\AgentInformation;
use App\AgentDocument;
use App\Country;
use App\Download;
use App\News;
use App\BranchLocation;
use App\Gallery;
use App\Slider;
use App\Testimonial;
use App\Cms as CMS;
use App\CountryCourseFee;
use App\ApplicationDateOfIntake;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function searchCourse(Request $request)
    {
        $this->validate(
            $request,
            [
                'search_term' =>'required',
            ],
            [
            ]
        );
        $categories = CourseCategory::all();
        $courses =    Course::with('category')->get();
        if ($request->input('search_term')) {
            $search =  $request->input('search_term');
            $results = Course::where('name', 'LIKE', '%' . $search . '%')->get();
            return view('front.course-filter', compact('categories'))->with([
                'courses' => $results,
                'keyword' => $search
            ]);
        }
        return view('front.courses', compact('categories', 'courses'));
    }
    public function index()
    {
        $courses =    Course::with('category')->get();
        $countries =  Country::where('status', '1')->get();
        $courses_categories = CourseCategory::with('courses')->get()->toArray();
        $news  =      News::where('status', '1')->limit(3)->get();
        $gallery =    Gallery::all();
        $gallery_category = \App\GalleryCategory::with('latest_gallery')->has('latest_gallery')->get()->toArray();
        $sliders =    Slider::where('status', '1')->get();
        $testimonials = Testimonial::where('status', '1')->with('country')->get()->toArray();
        $header = CMS::where('slug', 'welcome')->first();
        $lc = CMS::where('slug', 'lc')->first();
        $rc = CMS::where('slug', 'rc')->first();

        $ahic_studies = \App\AhicStudy::get()->toArray();
        return view('front.index', compact('courses', 'countries', 'news', 'gallery', 'sliders', 'header', 'lc', 'rc', 'testimonials', 'gallery_category', 'courses_categories', 'ahic_studies'));
    }
    public function courses()
    {
        $courses = Course::with('category')->get();
        $categories = CourseCategory::with('courses')->get();
        return view('front.courses', compact('courses', 'categories'));
    }

    public function readMore()
    {
        $welcome = CMS::where('slug', 'welcome')->first();
        return view('front.readmore', compact('welcome'));
    }
    public function course($course)
    {
        $name = str_replace('_', ' ', $course);
        $course = Course::where('name', $name)->with('category', 'requirements', 'outcomes', 'assessment', 'rpl', 'relation.competence', 'relation.category')->first();

        $all_courses = Course::where('status', '=', 1)->orderBy('name', 'asc')->get();
        if ($course) {
            $payment = PaymentOption::all();
            $categories = CourseCategory::all();
            return view('front.course', compact('course', 'payment', 'categories', 'all_courses'));
        }
    }
    public function courseCategory($category)
    {
        $name = str_replace('_', ' ', $category);
        $catgs = CourseCategory::where('name', $name)->with('courses')->first();
        $categories = CourseCategory::all();
        return view('front.courseCat', compact('catgs', 'categories'));
    }

    public function admission($subpage="")
    {
        $route =  \Request::segment(1);
        $page = Page::where('slug', $route)->get();
        if ($page) {
            $page = Page::where('slug', $route)->first()->id;
            $modules = PageModule::where('page_id', $page)->with('module', 'module.content')->get();
        }
        $intakeyear = ApplicationDateOfIntake::groupBy('year')->get();
        $intakes = ApplicationDateOfIntake::all();

        $courses = CourseCategory::with('courses')->get();
        if($subpage){
            return view('front.admissiondetail', compact('courses', 'intakeyear', 'intakes', 'modules', 'subpage'));
        }else{
            return view('front.admission', compact('courses', 'intakeyear', 'intakes', 'modules', 'route'));
        }
        
    }
    public function studentService($subpage="")
    {
        $route =  \Request::segment(1);
        $page = Page::where('slug', $route)->get();
        if ($page) {
            $page = Page::where('slug', $route)->first()->id;
        }
        $modules = PageModule::where('page_id', $page)->with('module', 'module.content')->get();

        $courses = Course::all();
        $categories = CourseCategory::all();
        if($subpage){
            return view('front.studentservicedetail', compact('courses', 'categories', 'modules', 'subpage'));
        }else{
            return view('front.studentservice', compact('courses', 'categories', 'modules'));
        }
        
    }

    public function download()
    {
        $downloads = Download::where('status', '1')->get();
        return view('front.download', compact('downloads'));
    }
    public function contact()
    {
        return view('front.contact');
    }

    public function agents()
    {
        $agents = AgentInformation::with('documents')->get();
        return view('front.agents', compact('agents'));
    }

    public function form()
    {
        $page = Page::where('slug', 'apply-now')->first();
        $intake_dates = ApplicationDateOfIntake::groupBy('year')->get();
        $ids = ApplicationDateOfIntake::all();
        $courses = Course::where('status', 1)->get();
        $companies = AgentDocument::all();
        return view('front.apply-now1', compact('intake_dates', 'courses', 'companies', 'ids', 'page'));
    }




//filter form
    public function intakes(Request $request)
    {
        $year = $request->year;
        $dates = ApplicationDateOfIntake::where('year', $year)->get();
        return view('front.partials.intake_dates')->with('dates', $dates)->render();
    }
    public function intake_date(Request $request)
    {
        $year = $request->year;
        $date = $request->month;
        return ApplicationDateOfIntake::where(function ($q) use ($year) {
            $q->where('year', $year);
        })->where('date', $date)->first();
    }

//Filter Functions
    public function filterCountry(Request $request)
    {
        $id = $request->id;
        if ($id == "") {
            $agents = AgentDocument::with('agent')->get();
        } else {
            $agents = AgentDocument::where('country', $id)->with('agent')->get();
        }
        return view('front.partials.agentFilter')->with('agents', $agents)->render();
    }
    public function filterAddress(Request $request)
    {
        $id = $request->id;
        $id = $request->id;
        if ($id == "") {
            $agents = AgentDocument::with('agent')->get();
        } else {
            $agents = AgentDocument::where('location', $id)->with('agent')->get();
        }
        return view('front.partials.agentFilterL')->with('agents', $agents)->render();
    }

//
    public function filterCountryL(Request $request)
    {
        $id = $request->id;
        $id = Country::where('name', $id)->first()->id;
        $locations = BranchLocation::where('country_id', $id)->get();
        return view('front.partials.locationFilter')->with('locations', $locations)->render();
    }

//Admisson fees
    public function filterFees(Request $request)
    {
        $fees = CountryCourseFee::where('country_id', $request->id)->get();
        $courses = CourseCategory::with('courses')->get();
        return view('front.partials.filterFees')->with('fees', $fees)->with('courses', $courses)->render();
    }

    public function debug($a)
    {
        echo "<pre>";
        print_r($a->toArray());
        die();
    }
}
