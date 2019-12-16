<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Facades\Log;
use App\ApplicationIfStudentUnderAge;

use Illuminate\Http\Request;

class FormController extends Controller
{
        public function validator($request){
          $this->validate($request,[
            'intake_year' => 'required',
            'intake_date' => 'required',
            // 'intake_id' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'familyname' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'birth_city' => 'required',
            'birth_country' => 'required',
            'usi_number' => 'required',
            'in_aus' => 'required',
            'v_category' => 'required',
            'v_exp_date' => 'required',
            'v_office' => 'required',
            'origin' => 'required',
            'course_id' => 'required',
            'company_id' => 'required',
            'nationality' => 'required',
            'passport_number' => 'required',
            'p_issued_date' => 'required',
            'p_expired_date' => 'required',
            'place_of_issue' => 'required',
            'aus_street' => 'required',
            'aus_city' => 'required',
            'aus_province' => 'required',
            'aus_country' => 'required',
            'aus_telephone' => 'required',
            'aus_email' => 'required|email',
            'aus_postcode' => 'required',
            'home_street' => 'required',
            'home_city' => 'required',
            'home_province' => 'required',
            'home_country' => 'required',
            'home_telephone' => 'required',
            'home_email' => 'required|email',
            'home_postcode' => 'required',
            'e_name' => 'required',
            'e_relationship' => 'required',
            'e_address' => 'required',
            'e_telephone' => 'required',
            'e_mobile' => 'required',
            'e_email' => 'required|email',
            'company_id' => 'required',
            'edu' => 'required',
            'eng_lang' => 'required',
            'evidence' => 'required',
            'score_achieved' => 'required|numeric',
            'year_taken' => 'required|numeric',
            'listening' => 'required|numeric',
            'writing' => 'required|numeric',
            'total_score' => 'required|numeric',
            'speaking' => 'required|numeric',
            'reading' => 'required|numeric',
            'rpl' => 'required',
            'application_fee' => 'required',
            'tution_fee' => 'required',
            'health_fee' => 'required',
            'airport_fee' => 'required',
            'pickup' => 'required',
            'acco_assistance' => 'required',
            'acco_start_date' => 'required|date',
            'disability' => 'required',
            'form_complete' => 'required',
            'pv_compete' => 'required',
            'qualifications_complete' => 'required',
            'language_complete' => 'required',
            'documents_complete' => 'required',
            'all_complete' => 'required',
            'parent_name' => 'required',
            'contact_detail' => 'required',
            'date' => 'required|date_format:"Y-m-d"',
          ],
          [
            'intake_year.required' => 'Intake Year is required',
            'intake_date.required' => 'Intake Date is required',
            // 'intake_id.required' => 'Intake date is required',
            'firstname.required' => 'Firstname is required',
            'middlename.required' => 'Middlename is required',
            'familyname.required' => 'Familyname is required',
            'dob.required' => 'DOB is required',
            'gender.required' => 'Gender is required',
            'birth_city.required' => 'Birth city is required',
            'birth_country.required' => 'Birth country is required',
            'usi_number.required' => 'USI number is required',
            'in_aus.required' => 'Are you in Australia now?',
            'v_category.required' => 'Visa category is required',
            'v_exp_date.required' => 'Visa expiry date is required',
            'v_office.required' => 'Visa applied office is required',
            'origin.required' => 'Origin is required',
            'course_id.required' => 'Select a course',
            'company_id.required' => 'Select a company',
            'nationality.required' => 'Nationality is required',
            'passport_number.required' => 'Passport number is required',
            'p_issued_date.required' => 'Passport issued date is required',
            'p_expired_date.required' => 'Passport expired date is required',
            'place_of_issue.required' => 'Place of issue is required',
            'aus_street.required' => 'Australia street name is required',
            'aus_city.required' => 'Australia city name is required',
            'aus_province.required' => 'Australia province name is required',
            'aus_country.required' => 'Country name is required',
            'aus_telephone.required' => 'Telephone is required',
            'aus_email.required' => 'Emailis required',
            'aus_postcode.required' => 'aus_postcode is required',
            'home_street.required' => 'Home street name is required',
            'home_city.required' => 'Home city name is required',
            'home_province.required' => 'Home province name is required',
            'home_country.required' => 'Home country name is required',
            'home_telephone.required' => 'Telephone number is required',
            'home_email.required' => 'Email is required',
            'home_postcode.required' => 'Home postcode is required',
            'e_name.required' => 'Emergency contact name is required',
            'e_relationship.required' => 'Emergency contact relationship is required',
            'e_address.required' => 'Emergency contact address is required',
            'e_telephone.required' => 'Emergency contact telephone is required',
            'e_mobile.required' => 'Emergency contact mobile number is required',
            'e_email.required' => 'Emergency contact email is required',
            'company_id.required' => 'Company is required',
            'edu.required' => 'edu is required',
            'eng_lang.required' => 'Is english your first language',
            'evidence.required' => 'Evidence is required',
            'score_achieved.required' => 'Score achieved is required',
            'year_taken.required' => 'Year taken is required',
            'listening.required' => 'Listening score  is required',
            'writing.required' => 'Writing score is required',
            'total_score.required' => 'Total score is required',
            'speaking.required' => 'Speaking score is required',
            'reading.required' => 'Reading score is required',
            'rpl.required' => 'RPL is required',
            'application_fee.required' => 'Application fee is required',
            'tution_fee.required' => 'Tution fee is required',
            'health_fee.required' => 'Health fee is required',
            'airport_fee.required' => 'Airport fee is required',
            'pickup.required' => 'Do you need airport pickup',
            'acco_assistance.required' => 'Do you need assiatance?',
            'acco_start_date.required' => 'Acoomodation start date is required',
            'disability.required' => 'Are you disabled',
            'form_complete.required' => 'Check is required',
            'pv_compete.required' => 'Check is required',
            'qualifications_complete.required' => 'Check is required',
            'language_complete.required' => 'Check is required',
            'documents_complete.required' => 'Check is required',
            'all_complete.required' => 'Check is required',
            'parent_name.required' => 'Parent name is required',
            'contact_detail.required' => 'Parent contact detail is required',
            'date.required' => 'Date is required',

          ]
        );
      }



      public function submitform(Request $request){
        $this->validator($request);

        $application_form_id ='';

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
        $data['status'] = 1;
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
          $data['if_acco'] = $request->input('if_acco');
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
