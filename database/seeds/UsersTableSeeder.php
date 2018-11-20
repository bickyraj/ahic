<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('modules')->insert([
            'title' => 'Student Support',
            'display_type' => '1',
            'status' => '1',
        ]);
    	DB::table('modules')->insert([
            'title' => 'Airport Pickup',
            'display_type' => '1',
            'status' => '1',
        ]);
    	DB::table('modules')->insert([
            'title' => 'Useful Links',
            'display_type' => '1',
            'status' => '1',
        ]);
    	DB::table('modules')->insert([
            'title' => 'Study In Austrailia',
            'display_type' => '1',
            'status' => '1',
        ]);
    	DB::table('modules')->insert([
            'title' => 'Agent List',
            'display_type' => '1',
            'status' => '1',
        ]);
    }
}
