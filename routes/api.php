<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Auth\LoginController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'Auth\LoginController@logout');
    Route::get('/get-user', 'Admin\UserController@getUser');
});

Route::get('/test', function() {
    return [1,3,4];
});

// shorten url function in front page by user.

Route::post('admin/change-password', 'AdminController@changePassword');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:api', 'admin']], function () {
    // Role functions.
    Route::get('roles', 'RoleController@index');
    Route::get('role/{id}', 'RoleController@show');
    Route::post('role', 'RoleController@store');
    Route::post('edit-role', 'RoleController@edit');
    Route::delete('role/{id}', 'RoleController@destroy');

    // User functions.
    Route::get('users', 'UserController@index');
    Route::get('user/{id}', 'UserController@show');
    Route::post('user', 'UserController@store');
    Route::post('user/update', 'UserController@update');
    Route::delete('user/{id}', 'UserController@destroy');

    // Menu functions.
    Route::get('menus', 'MenuController@index');
    Route::get('menu/{id}', 'MenuController@show');
    Route::post('menu', 'MenuController@store');
    Route::post('edit-menu', 'MenuController@update');
    Route::delete('menu/{id}', 'MenuController@destroy');
    
    // User functions.
    Route::get('pages', 'PageController@index');
    Route::get('page/{id}', 'PageController@show');
    Route::post('page', 'PageController@store');
    Route::post('edit-page', 'PageController@update');
    Route::delete('page/{id}', 'PageController@destroy');

    //Course Category
    Route::get('course_unit_categories','CourseUnitCategoryController@index');
    Route::get('course_unit_category/{id}','CourseUnitCategoryController@show');
    Route::post('course_unit_category', 'CourseUnitCategoryController@store');
    Route::post('course_unit_category/edit', 'CourseUnitCategoryController@update');
    Route::delete('course_unit_category/{id}', 'CourseUnitCategoryController@destroy');
    
    //Course Competences
    Route::get('course_unit_competences','CourseUnitCompetences@index');
    Route::get('course_unit_competence/{id}','CourseUnitCompetences@show');
    Route::post('course_unit_competence', 'CourseUnitCompetences@store');
    Route::post('course_unit_competence/edit', 'CourseUnitCompetences@update');
    Route::delete('course_unit_competence/{id}', 'CourseUnitCompetences@destroy');

});
