<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $pages = [
        ['name'=>'home','slug'=>'home','status'=>'1'],
        ['name'=>'courses','slug'=>'courses','status'=>'1'],
        ['name'=>'admission','slug'=>'admission','status'=>'1'],
        ['name'=>'student-service','slug'=>'student-service','status'=>'1'],
        ['name'=>'agents','slug'=>'agents','status'=>'1'],
        ['name'=>'download','slug'=>'download','status'=>'1'],
        ['name'=>'contact','slug'=>'contact','status'=>'1'],
      ];


              foreach($pages as $page){
                  DB::table('pages')->insert($page);
              };



      $menus =[
        ['name'=>'home','page_id'=>'1','status'=>'1','menu_order'=>'1'],
        ['name'=>'courses','page_id'=>'2','status'=>'1','menu_order'=>'2'],
        ['name'=>'admission','page_id'=>'3','status'=>'1','menu_order'=>'3'],
        ['name'=>'student services','page_id'=>'4','status'=>'1','menu_order'=>'4'],
        ['name'=>'agents','page_id'=>'5','status'=>'1','menu_order'=>'5'],
        ['name'=>'download','page_id'=>'6','status'=>'1','menu_order'=>'6'],
        ['name'=>'contact','page_id'=>'7','status'=>'1','menu_order'=>'7'],
      ];

      foreach($menus as $menu){
          DB::table('menus')->insert($menu);
      };


    }
}
