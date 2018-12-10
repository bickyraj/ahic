<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');



Route::get('/course/{course}', 'HomeController@course')->name('course');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/courses/{category}', 'HomeController@courseCategory')->name('courseCategory');
Route::get('/admission', 'HomeController@admission')->name('admission');
Route::get('/student-service', 'HomeController@studentService')->name('student-service');
Route::get('/agents', 'HomeController@agents')->name('agents');
Route::get('/download', 'HomeController@download')->name('download');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::post('/enquiry','EnquiryController@store')->name('enquiry');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('admin/export-table/{type}', 'Admin\UserController@exportTable');
Route::get('invoice', 'RoleController@invoicePdf');

Route::get('sendNotification', function () {
    // this fires the event
    event(new App\Events\TestNotification());
    return "event fired";
});


Route::get('{any}', function () {
    return view('layouts.app');
})->where('any', '.*');

Route::get('{slug}/{subslug}','PageController@slug');
Route::get('{slug}/','PageController@slug');
