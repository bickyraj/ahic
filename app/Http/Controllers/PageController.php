<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Page;
use App\PageModule;
use App\ApplicationDateOfIntake;

class PageController extends Controller
{
    public function slug($slug, $subslug="")
    {
        if ($subslug != "") {
            $page = Page::where('slug', $subslug)->first();
        } else {
            $page = Page::where('slug',$slug)->first();
        }

        if ($page) {
            $modules = PageModule::where('page_id',$page->id)->with('module','module.content')->get();
            if ($page->slug == "intakes") {
                $intakeyear = ApplicationDateOfIntake::groupBy('year')->get();
                $intakes = ApplicationDateOfIntake::all();
                return view('front.slug',compact('page','modules', 'intakes', 'intakeyear'));
            } elseif ($page->slug == "apply-now") {
                $intake_dates = ApplicationDateOfIntake::groupBy('year')->get();
                $ids = ApplicationDateOfIntake::all();
                $courses = 'App\Course'::where('status',1)->get();
                $companies = 'App\AgentDocument'::all();
                return view('front.apply-now1',compact('intake_dates','courses','companies','ids', 'page'));
            } else {
                return view('front.slug',compact('page','modules'));
            }
        } else {
            return redirect()->route('home');
        }

    }
}