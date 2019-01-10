<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use App\Menu;
use App\Page;
use App\Contact;
use App\Country;
use App\CourseCategory;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

      Schema::defaultStringLength(191);
      $menus = Menu::where('parent_id',null)->where('status','1')->orderBy('menu_order','asc')->with('submenus.parent_page','parent_page')->orderBy('menu_order','desc')->get()->toArray();
      // echo "<pre>";
      // print_r($menus);
      // die();
      $cats = CourseCategory::orderBy('order_by','asc')->get();
      $countries = Country::all();
      $contact = Contact::all();
      if($contact){
        if(isset($contact[0]))
            {
              $contact = $contact[0];
            }
                else{
              $contact =[];
            }

 }

      view()->share('contact', $contact);
      view()->share('menus', $menus);
      view()->share('cats',$cats);
      view()->share('countries',$countries);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      view()->composer('*', function ($view) {
        $route = \Route::current()->uri;

      if ($route =='/') {
        // code...
      }
      else{

        $route = explode('/',$route);
        $route= $route[0];


         if($route =='news')
        {
        }
        else if($route =='course')
        {
          $route = 'courses';
        }
        else if($route =='courses')
        {
          $route = 'courses';
        }

        else if($route =='search')
        {
          $route = 'courses';
        }
        else{
          $banner = Page::where('slug',$route)->first();
          if(isset($banner->image)){
            $banner = Page::where('slug',$route)->first()->image;
          }
          // all views will have access to current rout
          $view->with('banner',$banner);
        }

      }
      $banner = Page::where('slug',$route)->first();
      if(isset($banner->image)){
        $banner = Page::where('slug',$route)->first()->image;
      }
      // all views will have access to current rout
      $view->with('banner',$banner);
  });

    }
}
