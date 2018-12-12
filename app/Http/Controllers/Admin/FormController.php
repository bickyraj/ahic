<?php

namespace App\Http\Controllers\Admin;
use App\ApplicationDateOfIntake;
use App\ApplicationForm;
use App\ApplicationCourse;
use App\ApplicantPassport;
use App\ApplicationAddressInAustralia;
use App\ApplicationAddressInHomeCountry;
use App\ApplicationEmergencyContact;
use App\ApplicationEducationalQualification;
use App\ApplicationCurrentEnglishLevel;
use App\ApplicationRecognitionOfPriorLearning;
use App\ApplicationAdditionalServices;
use App\ApplicationCourseAndOtherFees;
use App\ApplicationCheckList;
use App\ApplicationAgent;
use App\ApplicationIfStudentUnderAge;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resource;


class FormController extends Controller
{
        public function store(Request $request){

          

            $application_form_id ='';

$data=[];
                $data = [];
                $data['date_of_intake_id'] =$request->input('intake_id');
                $data['firstname']= $request->input('firstname');
                $data['middlename']= $request->input('middlename');
                $data['familyname']= $request->input('familyname');
                $data['dob']= $request->input('dob');
                $data['gender']= $request->input('gender');
                $data['birth_city']= $request->input('birth_city');
                $data['birth_country']= $request->input('birth_country');
                $data['usi_number']= $request->input('usi_number');
                $data['in_australia']= $request->input('in_aus');
                $data['visa_category']= $request->input('v_category');
                $data['visa_expired_date']= $request->input('v_exp_date');
                $data['visa_office_applying_for']= $request->input('v_office');
                $data['islander_origin']= $request->input('origin');

                $creater = ApplicationForm::create($data);
                if($creater){
                    $application_form_id = $creater->id;
                    $data =[];
                    $data['course_id'] = $request->input('course_id');
                    $data['application_form_id'] = $application_form_id;
                    $creater  = ApplicationCourse::create($data);
// Application Passport

                $data = [];
                 $data['application_form_id'] = $application_form_id;
                $data['nationality'] = $request->input('nationality');
                $data['number'] = $request->input('passport_number');
                $data['issued_date'] = $request->input('p_issued_date');
                $data['expired_date'] = $request->input('p_expired_date');
                $data['place_of_issue'] = $request->input('place_of_issue');
                $creater = ApplicantPassport::create($data);
//Application Address in Aus
                $data = [];
                 $data['application_form_id'] = $application_form_id;
                $data['street'] = $request->input('aus_street');
                $data['city'] = $request->input('aus_city');
                $data['province'] = $request->input('aus_province');
                $data['country'] = $request->input('aus_country');
                $data['telephone'] = $request->input('aus_telephone');
                $data['email'] = $request->input('aus_email');
                $data['postcode'] = $request->input('aus_postcode');
                $creater = ApplicationAddressInAustralia::create($data);
//Application Address in Home
                $data = [];
                 $data['application_form_id'] = $application_form_id;
                $data['street'] = $request->input('home_street');
                $data['city'] = $request->input('home_city');
                $data['province'] = $request->input('home_province');
                $data['country'] = $request->input('home_country');
                $data['telephone'] = $request->input('home_telephone');
                $data['email'] = $request->input('home_email');
                $data['postcode'] = $request->input('home_postcode');
                $creater = ApplicationAddressInHomeCountry::create($data);
//Application Emergency Contact
                $data = [];
                 $data['application_form_id'] = $application_form_id;
                $data['name'] = $request->input('e_name');
                $data['relationship'] = $request->input('e_relationship');
                $data['address'] = $request->input('e_address');
                $data['telephone'] = $request->input('e_telephone');
                $data['mobile'] = $request->input('e_mobile');
                $data['email'] = $request->input('e_email');
                ApplicationEmergencyContact::create($data);
//Application Agent
                $data=[];
            $data['application_form_id'] = $application_form_id;
            $data['company_id'] = $request->input('company_id');
            ApplicationAgent::create($data);

//Application Education Qualification
                $eq = $request->input('edu');
                foreach($eq as $e){
                $data = [];
                 $data['application_form_id'] = $application_form_id;
                    $data['qualification']= $e['qualification'];
                    $data['educational_institution']= $e['institution'];
                    $data['start_year']= $e['started_year'];
                    $data['start_month']= $e['started_month'];
                    $data['completed_year']= $e['completed_year'];
                    $data['completed_month']= $e['completed_month'];
                    ApplicationEducationalQualification::create($data);
                }

  //Application Current English Level
        $data =[];
                 $data['application_form_id'] = $application_form_id;
                $data['english_first_lang'] = $request->input('eng_lang');
                $data['english_lang_test'] = $request->input('evidence');
                $data['score_achieved'] = $request->input('score_achieved');
                $data['year_taken'] = $request->input('year_taken');
                $data['listening'] = $request->input('listening');
                $data['writing'] = $request->input('writing');
                $data['total_score'] = $request->input('total_score');
                $data['speaking'] = $request->input('speaking');
                $data['reading'] = $request->input('reading');
                ApplicationCurrentEnglishLevel::create($data);
  //Application RPL
        $data =[];
                 $data['application_form_id'] = $application_form_id;
                $data['status'] = $request->input('rpl');
                ApplicationRecognitionOfPriorLearning::create($data);
  //Application course and other fees
        $data =[];
                 $data['application_form_id'] = $application_form_id;
                $data['application_fee'] = $request->input('application_fee');
                $data['tution_fee'] = $request->input('tution_fee');
                $data['overseas_student_health_cover'] = $request->input('health_fee');
                $data['airport_pickup_fee'] = $request->input('airport_fee');
                ApplicationCourseAndOtherFees::create($data);
  //Application additional Services
        $data =[];
                 $data['application_form_id'] = $application_form_id;
                $data['airport_pickup'] = $request->input('pickup');
                $data['assistance_with_accomodation'] = $request->input('acco_assistance');
                $data['accomodation_start_date'] = $request->input('acco_start_date');
                $data['disability'] = $request->input('disability');
                $data['if_disability'] = $request->input('if_disability');
                ApplicationAdditionalServices::create($data);
  //Application Check List
        $data =[];
    $data['application_form_id'] = $application_form_id;
	$data['completed_all_form'] = $request->input('form_complete');
	$data['enclosed_certified_passport_and_visa'] = $request->input('pv_compete');
	$data['enclosed_qualification'] = $request->input('qualifications_complete');
	$data['enclosed_english_lang_proficiency'] = $request->input('language_complete');
	$data['enclosed_certified_documents'] = $request->input('documents_complete');
	$data['read_ticked_declaration'] = $request->input('all_complete');
                ApplicationCheckList::create($data);
  //Application If underage
        $data =[];
        $data['application_form_id'] = $application_form_id;
        $data['parent_name'] = $request->input('parent_name');
        $data['contact_detail'] = $request->input('contact_detail');
        $data['date'] = $request->input('date');
                ApplicationIfStudentUnderAge::create($data);

 }
                else{
                }
        }
}
