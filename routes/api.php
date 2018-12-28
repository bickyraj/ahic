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

// shorten url function in front page by user.

Route::post('admin/change-password', 'AdminController@changePassword');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:api', 'admin']], function () {
Route::post('/form/submit', 'FormController@store');

    // Newsletterfunctions.
    Route::get('newsletters', 'NewsletterController@index');
    Route::post('newsletter/edit', 'NewsletterController@edit');
    Route::delete('newsletter/{id}', 'NewsletterController@destroy');

    // Message functions.
    Route::get('messages', 'MessageController@index');
    Route::post('message/edit', 'MessageController@edit');
    Route::delete('message/{id}', 'MessageController@destroy');

    // Role functions.
    Route::get('roles', 'RoleController@index');
    Route::get('role/{id}', 'RoleController@show');
    Route::post('role', 'RoleController@store');
    Route::post('edit-role', 'RoleController@edit');
    Route::delete('role/{id}', 'RoleController@destroy');

    // Enq functions.
    Route::get('enquiries', 'EnquiryController@index');
    Route::get('enquiry/{id}', 'EnquiryController@show');
    Route::post('enquiry', 'EnquiryController@store');
    Route::post('enquiry/edit/{id}', 'EnquiryController@edit');
    Route::delete('enquiry/{id}', 'EnquiryController@destroy');
    // Enq functions.
    Route::get('downloads', 'DownloadController@index');
    Route::get('download/{id}', 'DownloadController@show');
    Route::post('download', 'DownloadController@store');
    Route::post('download/edit', 'DownloadController@edit');
    Route::delete('download/{id}', 'DownloadController@destroy');

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
    Route::post('menus/update-order', 'MenuController@updateOrder');
    Route::post('edit-menu', 'MenuController@update');
    Route::delete('menu/{id}', 'MenuController@destroy');

    // News functions.
    Route::get('news', 'NewsController@index');
    Route::get('news/{id}', 'NewsController@show');
    Route::post('news', 'NewsController@store');
    Route::post('news/update-order', 'NewsController@updateOrder');
    Route::post('news/edit', 'NewsController@update');
    Route::delete('news/{id}', 'NewsController@destroy');

    // Gallery functions.
    Route::get('gallery', 'GalleryController@index');
    Route::get('gallery/{id}', 'GalleryController@show');
    Route::post('gallery', 'GalleryController@store');
    Route::post('gallery/update-order', 'GalleryController@updateOrder');
    Route::delete('gallery/{id}', 'GalleryController@destroy');

    // Contact functions.
    Route::get('contact', 'ContactController@index');
    Route::get('contact/{id}', 'ContactController@show');
    Route::post('contact', 'ContactController@store');
    Route::post('contact/edit', 'ContactController@update');

    // Slider functions.
    Route::get('sliders', 'SliderController@index');
    Route::get('slider/{id}', 'SliderController@show');
    Route::post('slider', 'SliderController@store');
    Route::post('slider/edit', 'SliderController@update');
    Route::post('slider/update-order', 'SliderController@updateOrder');
    Route::delete('slider/{id}', 'SliderController@destroy');

    // CMS functions.
    Route::get('cms', 'CmsController@index');
    Route::get('cms/{slug}', 'CmsController@slug');
    Route::post('cms', 'CmsController@store');
    Route::post('cms/edit', 'CmsController@update');
    Route::delete('cms/{id}', 'CmsController@destroy');

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
    Route::get('courses/{id}/showByCategory','CourseController@showByCategory');
    Route::post('course', 'CourseController@store');
    Route::post('course/edit/{category}', 'CourseController@update');
    Route::post('course/update-order', 'CourseController@updateOrder');
    Route::post('course/update', 'CourseController@edit');
    Route::delete('course/{id}', 'CourseController@destroy');

    //Courses Category
    Route::get('course_categories','CourseCategoryController@index');
    Route::get('course_categories/{course_id}','CourseCategoryController@getCategory');
    Route::get('course_category/{id}','CourseCategoryController@show');
    Route::get('course_category/get/{id}','CourseCategoryController@getName');
    Route::post('course_category', 'CourseCategoryController@store');
    Route::post('course_category/update-order', 'CourseCategoryController@updateOrder');
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
    Route::post('module_content/{id}', 'ModuleContentController@store');
    Route::get('module_content/{id}/showByParent','ModuleContentController@showByParent');
    Route::post('module_content/edit/{id}', 'ModuleContentController@update');
    Route::delete('module_content/{id}', 'ModuleContentController@destroy');

    //Module Content
    Route::get('page_modules','PageModuleController@index');
    Route::get('page_module/{id}','PageModuleController@show');
    Route::get('page_modules/{id}','PageModuleController@showByPage');
    Route::post('page_module', 'PageModuleController@store');
    Route::post('page_module/edit', 'PageModuleController@update');
    Route::delete('page_module/{id}', 'PageModuleController@destroy');

    //Payment Option
    Route::get('payment_options','PaymentOptionController@index');
    Route::get('payment_option/{id}','PaymentOptionController@show');
    Route::post('payment_option', 'PaymentOptionController@store');
    Route::post('payment_option/edit', 'PaymentOptionController@update');
    Route::delete('payment_option/{id}', 'PaymentOptionController@destroy');

      //Agent Information
    Route::get('agent_informations','AgentInformationController@index');
    Route::get('agent_information/students', 'AgentInformationController@students');
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

      //Country
    Route::get('countries','CountryController@index');
    Route::get('country/{id}','CountryController@show');
    Route::get('countries/{id}','CountryController@get');
    Route::post('country', 'CountryController@store');
    Route::post('country/edit', 'CountryController@update');
    Route::delete('country/{id}', 'CountryController@destroy');

      //Agent Agreement
    Route::get('branch_locations','BranchLocationController@index');
    Route::get('branch_location/{id}','BranchLocationController@show');
    Route::get('branch_locations/{id}','BranchLocationController@get');
    Route::get('branch_locations/getid/{id}','BranchLocationController@getid');
    Route::post('branch_location', 'BranchLocationController@store');
    Route::post('branch_location/edit', 'BranchLocationController@update');
    Route::delete('branch_location/{id}', 'BranchLocationController@destroy');

      //Agent Agreement
    Route::get('application_forms','ApplicationFormController@index');
    Route::get('application_form/{id}','ApplicationFormController@fetch');


    Route::post('intake','ApplicationDateOfIntakeController@store');
    Route::get('intakes','ApplicationDateOfIntakeController@index');
    Route::get('intake/{id}','ApplicationDateOfIntakeController@show');
    Route::get('intakes/form','ApplicationDateOfIntakeController@form');
    Route::get('intakes/form/{year}','ApplicationDateOfIntakeController@getByYear');
    Route::get('intakes/find/{year}/{month}','ApplicationDateOfIntakeController@find');
        Route::post('intake/edit', 'ApplicationDateOfIntakeController@update');
    Route::delete('intake/{id}', 'ApplicationDateOfIntakeController@destroy');

});
