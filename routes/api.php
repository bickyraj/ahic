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
    Route::get('pages/{id}', 'PageController@get');
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

    //Course Relations
    Route::get('course_unit_relations','CourseUnitRelationController@index');
    Route::get('course_unit_relations/{id}','CourseUnitRelationController@showByCourse');
    Route::get('course_unit_relation/{id}','CourseUnitRelationController@show');
    Route::post('course_unit_relation', 'CourseUnitRelationController@store');
    Route::post('course_unit_relation/edit', 'CourseUnitRelationController@update');
    Route::delete('course_unit_relation/{id}', 'CourseUnitRelationController@destroy');
    
    //Courses
    Route::get('courses','CourseController@index');
    Route::get('course/{id}','CourseController@show');
    Route::get('courses/{id}','CourseController@showByCourse');
    Route::post('course', 'CourseController@store');
    Route::post('course/edit', 'CourseController@update');
    Route::post('course/update', 'CourseController@edit');
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
    Route::get('career_outcomes/{id}','CourseCareerOutcomeController@showByCourse');
    Route::post('career_outcome', 'CourseCareerOutcomeController@store');
    Route::post('career_outcome/edit', 'CourseCareerOutcomeController@update');
    Route::delete('career_outcome/{id}', 'CourseCareerOutcomeController@destroy');

    //Course Assessments
    Route::get('course_assessments','CourseAssessmentController@index');
    Route::get('course_assessment/{id}','CourseAssessmentController@show');
    Route::post('course_assessment', 'CourseAssessmentController@store');
    Route::post('course_assessment/edit', 'CourseAssessmentController@update');
    Route::post('course_assessment/update', 'CourseAssessmentController@edit');
    Route::delete('course_assessment/{id}', 'CourseAssessmentController@destroy');

    //Course RPL
    Route::get('course_rpls','CourseRplController@index');
    Route::get('course_rpl/{id}','CourseRplController@show');
    Route::post('course_rpl', 'CourseRplController@store');
    Route::post('course_rpl/edit', 'CourseRplController@update');
    Route::post('course_rpl/update', 'CourseRplController@edit');
    Route::delete('course_rpl/{id}', 'CourseRplController@destroy');

    //Course Assessments
    Route::get('course_entry_requirements','CourseEntryRequirementController@index');
    Route::get('course_entry_requirement/{id}','CourseEntryRequirementController@show');
    Route::get('course_entry_requirements/{id}','CourseEntryRequirementController@showByCourse');
    Route::post('course_entry_requirement', 'CourseEntryRequirementController@store');
    Route::post('course_entry_requirement/edit', 'CourseEntryRequirementController@update');
    Route::delete('course_entry_requirement/{id}', 'CourseEntryRequirementController@destroy');
    
    //Modules
    Route::get('modules','ModuleController@index');
    Route::get('module/{id}','ModuleController@show');
    Route::get('modules/{id}','ModuleController@showByCourse');
    Route::post('module', 'ModuleController@store');
    Route::post('module/edit', 'ModuleController@update');
    Route::delete('module/{id}', 'ModuleController@destroy');

    //Module Content
    Route::get('module_contents','ModuleContentController@index');
    Route::get('module_content/{id}','ModuleContentController@show');
    Route::get('module_contents/{id}','ModuleContentController@showByCourse');
    Route::post('module_content', 'ModuleContentController@store');
    Route::post('module_content/edit', 'ModuleContentController@update');
    Route::delete('module_content/{id}', 'ModuleContentController@destroy');

    //Module Content
    Route::get('page_modules','PageModuleController@index');
    Route::get('page_module/{id}','PageModuleController@show');
    Route::get('page_modules/{id}','PageModuleController@showByPage');
    Route::post('page_module', 'PageModuleController@store');
    Route::post('page_module/edit', 'PageModuleController@update');
    Route::delete('page_module/{id}', 'PageModuleController@destroy');

      //Agent Information
    Route::get('agent_informations','AgentInformationController@index');
    Route::get('agent_information/{id}','AgentInformationController@show');
    Route::get('agent_informations/{id}','AgentInformationController@get');
    Route::post('agent_information', 'AgentInformationController@store');
    Route::post('agent_information/edit', 'AgentInformationController@update');
    Route::delete('agent_information/{id}', 'AgentInformationController@destroy');

      //Agent Documents
    Route::get('agent_documents','AgentDocumentController@index');
    Route::get('agent_document/{id}','AgentDocumentController@show');
    Route::get('agent_documents/{id}','AgentDocumentController@get');
    Route::post('agent_document', 'AgentDocumentController@store');
    Route::post('agent_document/edit', 'AgentDocumentController@update');
    Route::delete('agent_document/{id}', 'AgentDocumentController@destroy');

      //Agent Agreement
    Route::get('agent_agreement_processes','AgentAgreementProcessController@index');
    Route::get('agent_agreement_process/{id}','AgentAgreementProcessController@show');
    Route::get('agent_agreement_processes/{id}','AgentAgreementProcessController@get');
    Route::post('agent_agreement_process', 'AgentAgreementProcessController@store');
    Route::post('agent_agreement_process/edit', 'AgentAgreementProcessController@update');
    Route::delete('agent_agreement_process/{id}', 'AgentAgreementProcessController@destroy');

});
