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
    Route::get('course_unit_competences','CourseUnitCompetencesController@index');
    Route::get('course_unit_competence/{id}','CourseUnitCompetencesController@show');
    Route::post('course_unit_competence', 'CourseUnitCompetencesController@store');
    Route::post('course_unit_competence/edit', 'CourseUnitCompetencesController@update');
    Route::delete('course_unit_competence/{id}', 'CourseUnitCompetencesController@destroy');
    
    //Courses
    Route::get('courses','CourseController@index');
    Route::get('course/{id}','CourseController@show');
    Route::post('course', 'CourseController@store');
    Route::post('course/edit', 'CourseController@update');
    Route::delete('course/{id}', 'CourseController@destroy');

    //Courses Category
    Route::get('course_categories','CourseCategoryController@index');
    Route::get('course_category/{id}','CourseCategoryController@show');
    Route::post('course_category', 'CourseCategoryController@store');
    Route::post('course_category/edit', 'CourseCategoryController@update');
    Route::delete('course_category/{id}', 'CourseCategoryController@destroy');

    //Career Outcome
    Route::get('career_outcomes','CourseCareerOutcomeController@index');
    Route::get('career_outcome/{id}','CourseCareerOutcomeController@show');
    Route::post('career_outcome', 'CourseCareerOutcomeController@store');
    Route::post('career_outcome/edit', 'CourseCareerOutcomeController@update');
    Route::delete('career_outcome/{id}', 'CourseCareerOutcomeController@destroy');

    //Course Assessments
    Route::get('course_assessments','CourseAssessmentController@index');
    Route::get('course_assessment/{id}','CourseAssessmentController@show');
    Route::post('course_assessment', 'CourseAssessmentController@store');
    Route::post('course_assessment/edit', 'CourseAssessmentController@update');
    Route::delete('course_assessment/{id}', 'CourseAssessmentController@destroy');

    //Course RPL
    Route::get('course_rpls','CourseRplController@index');
    Route::get('course_rpl/{id}','CourseRplController@show');
    Route::post('course_rpl', 'CourseRplController@store');
    Route::post('course_rpl/edit', 'CourseRplController@update');
    Route::delete('course_rpl/{id}', 'CourseRplController@destroy');

});
