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


// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     $exitCode = Artisan::call('route:clear');
//     // return what you want
// });

Route::get('/', 'HomeController@index')->name('home');

Route::post('/agents/country_filter','HomeController@filterCountry');
Route::post('/agents/address_filter','HomeController@filterAddress');
Route::post('/agents/country_filter/locations','HomeController@filterCountryL');

Route::post('/course/country_filter','HomeController@filterFees');

Route::get('/apply-now', 'HomeController@form')->name('apply_now');
Route::post('/intake/year', 'HomeController@intakes');
Route::post('/intake/date', 'HomeController@intake_date');

Route::get('/galleries', 'GalleryCategoryController@getAllGalleries')->name('galleries');

Route::get('/addEdu/{count}', function($count){
  return view('front.partials.addEdu')->with('count',$count);
});

Route::post('/submit-admission','FormController@submitform');

Route::get('/course/{course}', 'HomeController@course')->name('course');
Route::get('/courses', 'HomeController@courses')->name('courses');
Route::get('/courses/{category}', 'HomeController@courseCategory')->name('courseCategory');
Route::get('/admission', 'HomeController@admission')->name('admission');
Route::get('/admission/{subpage}', 'HomeController@admission')->name('admission');
Route::get('/student-service', 'HomeController@studentService')->name('student-service');
Route::get('/student-service/{subpage}', 'HomeController@studentService')->name('student-service');
Route::get('/agents', 'HomeController@agents')->name('agents');
Route::post('/agents', 'AgentInformationController@store')->name('agents.store');
Route::get('/download', 'HomeController@download')->name('download');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/welcome', 'HomeController@readMore')->name('welcome');
Route::post('/course/search', 'HomeController@searchCourse')->name('search');
// News
Route::get('/news', 'NewsController@news')->name('news');
Route::get('/news/{news}', 'NewsController@singleNews')->name('singleNews');


Route::post('/enquiry','EnquiryController@store')->name('enquiry');
Route::post('/newsletter','NewsletterController@store')->name('newsletter');
Route::post('/message','MessageController@store')->name('message');


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

Route::get('/admin', function () {
    return view('layouts.app');
})->where('any', '.*');
Route::get('/admin/{any}', function () {
    return view('layouts.app');
})->where('any', '.*');

Route::get('{slug}/','PageController@slug');

Route::get('{slug}/{subslug}','PageController@slug');
