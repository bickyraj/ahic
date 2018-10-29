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
});
