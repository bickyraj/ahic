<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        // add admin to users table.
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'firstname' => 'admin',
            'lastname' => 'admin',
            'role_id' => 1,
            'password' => bcrypt('test123'),
        ]);

        DB::table('course_unit_categories')->insert([
            'name' => 'Core Units',
            'order_by' => 1,
            'status' => 1,
        ]);
        DB::table('course_unit_categories')->insert([
            'name' => 'Elective Units',
            'order_by' => 1,
            'status' => 1,
        ]);

        // add admin role to roles table
        DB::table('roles')->insert([
            'name' => 'admin',
            'status' => 1,
        ]);

    }
}
