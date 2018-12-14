<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;
use App\Menu;
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
          $cats = CourseCategory::orderBy('order_by','asc')->get();
          view()->share('menus', $menus);
          view()->share('cats',$cats);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
