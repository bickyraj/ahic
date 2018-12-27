
<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Admission Form </h5>
            </div>
            </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <form action="" ref="admissionForm">
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course And Date Commencement</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <label for=""> Choose A Year</label>
                            <select name="intake_year" id="" v-model="intake_year" class="form-control">
                                <option value="" selected >Select A Year </option>
                                <option  v-for="intake in intakes" :key="intake.id" :value="intake.year">{{intake.year}} </option>
                            </select>

                            <label for=""> Choose A Date</label>
                            <select name="intake_date" id=""  v-model="date" class="form-control">
                                <option  selected value="">Select A Date </option>
                                <option  v-for="intake_date in intake_dates" :key="intake_date.id" :value="intake_date.date">{{intake_date.date}} </option>
                            </select>
                            <input type="hidden" v-model="date_of_intake_id" name="intake_id">
                            <transition name="fade">
                            <p v-if="error.intake_id" class="text-danger"> {{error.intake_id[0]}}</p>
                            </transition>

                        </div>
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course Description</h5>
                        </div>

                        <div class="form-group col-md-12">
                            <label for=""> Choose A Course</label>
                            <select name="course_id" id="" class="form-control">
                              <option selected value=""> Choose A Course</option>
                                <option  v-for="course in courses" :key="course.id" :value="course.id"> {{course.name}} </option>
                            </select>
                            <transition name="fade">
                            <p v-if="error.course_id" class="text-danger"> {{error.course_id[0]}}</p>
                            </transition>
                        </div>

                        <div class="form-group col-md-12">
                            <label for=""> Choose Company </label>
                            <select name="company_id" id="" class="form-control">
                              <option value="" selected> Choose Company</option>
                                <option  v-for="company in agents" :key="company.id" :value="company.id"> {{company.company_name}} </option>
                            </select>
                            <transition name="fade">
                            <p v-if="error.company_id" class="text-danger"> {{error.company_id[0]}}</p>
                            </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Personal Details</h5>
                                 </div>
                            <div class="row">

                        <div class="form-group col-md-3">
                            <label for="">Title And Family Name</label>
                                    <input type="text" class="form-control" name="familyname" value="">
                                    <transition name="fade">
                                    <p v-if="error.familyname" class="text-danger"> {{error.familyname[0]}}</p>
                                    </transition>
                            </div>

                        <div class="form-group col-md-3">
                            <label for="">First Name</label>
                                    <input type="text" name="firstname" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.firstname" class="text-danger"> {{error.firstname[0]}}</p>
                                    </transition>
                         </div>

                        <div class="form-group col-md-3">
                            <label for="">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.middlename" class="text-danger"> {{error.middlename[0]}}</p>
                                    </transition>
                         </div>


                        <div class="form-group col-md-3">
                            <label for="">DOB</label>
                            <datepicker format="yyyy-MM-dd" name="dob"  bootstrap-styling  :initialView="'year'" ></datepicker>
                            <transition name="fade">
                            <p v-if="error.dob" class="text-danger"> {{error.dob[0]}}</p>
                            </transition>
                         </div>

                        <div class="form-group col-md-3">
                            <label for="">Gender</label>
                                    <input type="text" name="gender" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.gender" class="text-danger"> {{error.gender[0]}}</p>
                                    </transition>
                         </div>

                        <div class="form-group col-md-3">
                            <label for="">Place Of Birth City </label>
                                    <input type="text" name="birth_city" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.birth_city" class="text-danger"> {{error.birth_city[0]}}</p>
                                    </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Country </label>
                                    <input type="text" name="birth_country" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.birth_country" class="text-danger"> {{error.birth_country[0]}}</p>
                                    </transition>

                         </div>

                        <div class="form-group col-md-3">
                            <label for="">Nationality </label>
                                    <input type="text" name="nationality" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.nationality" class="text-danger"> {{error.nationality[0]}}</p>
                                    </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Passport Number </label>
                                    <input type="text" name="passport_number" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.passport_number" class="text-danger"> {{error.passport_number[0]}}</p>
                                    </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Issued Date </label>
                            <datepicker format="yyyy-MM-dd" name="p_issued_date"  bootstrap-styling  :initialView="'year'" ></datepicker>
                            <transition name="fade">
                            <p v-if="error.p_issued_date" class="text-danger"> {{error.p_issued_date[0]}}</p>
                            </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Expired Date </label>
                            <datepicker format="yyyy-MM-dd" name="p_expired_date"  bootstrap-styling  :initialView="'year'" ></datepicker>
                            <transition name="fade">
                            <p v-if="error.p_expired_date" class="text-danger"> {{error.p_expired_date[0]}}</p>
                            </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Place Of Issue </label>
                                    <input type="text" name="place_of_issue" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.place_of_issue" class="text-danger"> {{error.place_of_issue[0]}}</p>
                                    </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Unique Stident Identifier (USI Number) </label>
                                    <input type="text" name="usi_number" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.usi_number" class="text-danger"> {{error.usi_number[0]}}</p>
                                    </transition>
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">UVisa - Are You In Australia now?  </label> <br>
                                    <input type="radio" value="1" name="in_aus"> YES
                                    <input type="radio" value="0" name="in_aus" > NO
                                    <transition name="fade">
                                    <p v-if="error.in_aus" class="text-danger"> {{error.in_aus[0]}}</p>
                                    </transition>
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">Visa Category</label>
                                    <input type="text"  class="form-control" name="v_category" value="">
                                    <transition name="fade">
                                    <p v-if="error.v_category" class="text-danger"> {{error.v_category[0]}}</p>
                                    </transition>
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">Visa Expired Date</label>
                            <datepicker format="yyyy-MM-dd" name="v_exp_date"  bootstrap-styling  :initialView="''" ></datepicker>
                            <transition name="fade">
                            <p v-if="error.v_exp_date" class="text-danger"> {{error.v_exp_date[0]}}</p>
                            </transition>
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">At which office are you going to apply for your visa</label>
                                    <input type="text" name="v_office" class="form-control" value="">
                                    <transition name="fade">
                                    <p v-if="error.v_office" class="text-danger"> {{error.v_office[0]}}</p>
                                    </transition>
                         </div>
                            <div class="form-group col-md-9">
                            <label for="">Are You Aboriginal or Torress Strait Islander origin?</label><br>
                                <input type="radio" name="origin" value="0" > No
                                <input type="radio" name="origin" value="1"> Yes, Aboriginal
                                <input type="radio" name="origin" value="2" > Yes, Torress Strait Islander
                                <input type="radio" name="origin" value="3"> Yes, both Aboriginal Torress Strait Islander
                                <transition name="fade">
                                <p v-if="error.origin" class="text-danger"> {{error.origin[0]}}</p>
                                </transition>
                         </div>

                            </div>

                         </div>

                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Australia</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control" name="aus_street" value=""a>
                                <transition name="fade">
                                <p v-if="error.aus_street" class="text-danger"> {{error.aus_street[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control" name="aus_city" value="">
                                <transition name="fade">
                                <p v-if="error.aus_city" class="text-danger"> {{error.aus_city[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control" name="aus_province" value="">
                                <transition name="fade">
                                <p v-if="error.aus_province" class="text-danger"> {{error.aus_province[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control" name="aus_postcode" value="">
                                <transition name="fade">
                                <p v-if="error.aus_postcode" class="text-danger"> {{error.aus_postcode[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Email </label>
                                <input type="text" class="form-control" name="aus_email" value="">
                                <transition name="fade">
                                <p v-if="error.aus_email" class="text-danger"> {{error.aus_email[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" value="Australia" name="aus_country" >
                                <transition name="fade">
                                <p v-if="error.aus_country" class="text-danger"> {{error.aus_country[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="aus_telephone"  value="">
                                <transition name="fade">
                                <p v-if="error.aus_telephone" class="text-danger"> {{error.aus_telephone[0]}}</p>
                                </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Home Country</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control" name="home_street" value="">
                                <transition name="fade">
                                <p v-if="error.home_street" class="text-danger"> {{error.home_street[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control" name="home_city" value="">
                                <transition name="fade">
                                <p v-if="error.home_city" class="text-danger"> {{error.home_city[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control" name="home_province" value="">
                                <transition name="fade">
                                <p v-if="error.home_province" class="text-danger"> {{error.home_province[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control" name="home_email" value="">
                                <transition name="fade">
                                <p v-if="error.home_email" class="text-danger"> {{error.home_email[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control" name="home_postcode" value="">
                                <transition name="fade">
                                <p v-if="error.home_postcode" class="text-danger"> {{error.home_postcode[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" name="home_country" value="">
                                <transition name="fade">
                                <p v-if="error.home_country" class="text-danger"> {{error.home_country[0]}}</p>
                                </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="home_telephone" value="">
                                <transition name="fade">
                                <p v-if="error.home_telephone" class="text-danger"> {{error.home_telephone[0]}}</p>
                                </transition>
                        </div>

                       </div>

                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Emergency Contact</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Name</label>
                                <input type="text" class="form-control" name="e_name" value="">
                                <transition name="fade">
                                <p v-if="error.e_name" class="text-danger"> {{error.e_name[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Relationship</label>
                                <input type="text" class="form-control" name="e_relationship" value="">
                                <transition name="fade">
                                <p v-if="error.e_relationship" class="text-danger"> {{error.e_relationship[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Address</label>
                                <input type="text" class="form-control" name="e_address" value="">
                                <transition name="fade">
                                <p v-if="error.e_address" class="text-danger"> {{error.e_address[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="e_telephone" value="">
                                <transition name="fade">
                                <p v-if="error.e_telephone" class="text-danger"> {{error.e_telephone[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Mobile</label>
                                <input type="text" class="form-control" name="e_mobile" value="">
                                <transition name="fade">
                                <p v-if="error.e_mobile" class="text-danger"> {{error.e_mobile[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control" name="e_email" value="">
                                <transition name="fade">
                                <p v-if="error.e_email" class="text-danger"> {{error.e_email[0]}}</p>
                                </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Educational Qualifications <small> <button class="btn btn-success float-right" @click.prevent="addQ">Add</button> </small> </h5>
                        </div>
    <div class="row" v-for="(n,qs) in q" :key="n" :ref="'Q'+n" :use="qs">
    <div class="col-md-12">
       <small class="float-right"> <button class="btn btn-danger" @click.prevent="removeQ(n)">
         <i class="fa fa-minus-circle" aria-hidden="true"></i>
 </button> </small>
        <!-- <input type="text" :value="n"> -->
    </div>

                     <div class="form-group col-md-6">
                            <label for=""> Qualification/Award</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][qualification]'" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Educational Institution</label>
                                <input type="text" class="form-control"  :name="'edu['+n+'][institution]'" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Month</label>
                            <datepicker format="MM" :name="'edu['+n+'][started_month]'"  bootstrap-styling :minimumView="'month'" :maximumView="'month'" :initialView="'month'"   ></datepicker>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Year</label>
                            <datepicker format="yyyy" :name="'edu['+n+'][started_year]'"  bootstrap-styling :minimumView="'year'" :maximumView="'year'" :initialView="'year'"   ></datepicker>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Month</label>
                            <datepicker format="MM" :name="'edu['+n+'][completed_month]'"  bootstrap-styling :minimumView="'month'" :maximumView="'month'" :initialView="'month'"   ></datepicker>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Year</label>
                            <datepicker format="yyyy" :name="'edu['+n+'][completed_year]'"  bootstrap-styling :minimumView="'year'" :maximumView="'year'" :initialView="'year'"   ></datepicker>
                        </div>

    </div>


                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Current English Level</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Is English your First Language?</label> <br>
                                <input type="radio" name="eng_lang"  value="1"> Yes
                                <input type="radio" name="eng_lang" value="0"> No
                                <transition name="fade">
                                <p v-if="error.eng_lang" class="text-danger"> {{error.eng_lang[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Please Provide evidence of your English languafe proficiency.</label> <br>
                                <input type="radio" name="evidence" value="1"> IELTS
                                <input type="radio" name="evidence" value="2" > TOEFL
                                <input type="radio" name="evidence" value="3"> PTE
                                <input type="radio" name="evidence" value="4"> CAE
                                <input type="radio" name="evidence" value="5"> Other
                                <transition name="fade">
                                <p v-if="error.evidence" class="text-danger"> {{error.evidence[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Score Achieved</label>
                                <input type="text" class="form-control" name="score_achieved" value="">
                                <transition name="fade">
                                <p v-if="error.score_achieved" class="text-danger"> {{error.score_achieved[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Year Taken</label>
                                <input type="text" class="form-control" name="year_taken" value="">
                                <transition name="fade">
                                <p v-if="error.year_taken" class="text-danger"> {{error.year_taken[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Listening</label>
                                <input type="text" class="form-control" name="listening" value="">
                                <transition name="fade">
                                <p v-if="error.listening" class="text-danger"> {{error.listening[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Reading</label>
                                <input type="text" class="form-control" name="reading" value="">
                                <transition name="fade">
                                <p v-if="error.reading" class="text-danger"> {{error.reading[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Writing</label>
                                <input type="text" class="form-control" name="writing" value="">
                                <transition name="fade">
                                <p v-if="error.writing" class="text-danger"> {{error.writing[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Speaking</label>
                                <input type="text" class="form-control" name="speaking" value="">
                                <transition name="fade">
                                <p v-if="error.speaking" class="text-danger"> {{error.speaking[0]}}</p>
                                </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Total Score</label>
                                <input type="text" class="form-control" name="total_score" value="">
                                <transition name="fade">
                                <p v-if="error.total_score" class="text-danger"> {{error.total_score[0]}}</p>
                                </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Recognition Of Prior Learning</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Based onpast education qualifications, are you going to apply for Recognition of Prior Learning or Based om past Australian VET qualifications, are you going to apply for Credit (CT) (Advanced standing) </label> <br>
                                <input type="radio" name="rpl" value="1" > Yes
                                <input type="radio" name="rpl" value="0"> No <br>
                                <i> If yes, pleaserefer to CT and RPL in the International Student Handbook on oir website.</i>
                                <transition name="fade">
                                <p v-if="error.rpl" class="text-danger"> {{error.rpl[0]}}</p>
                                </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course and Other Fees</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Application Fee </label> <br>
                               <input type="text"  value="" class="form-control" name="application_fee">
                               <transition name="fade">
                               <p v-if="error.application_fee" class="text-danger"> {{error.application_fee[0]}}</p>
                               </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Tution Fee </label> <br>
                               <input type="text"  value="" class="form-control" name="tution_fee">
                               <transition name="fade">
                               <p v-if="error.tution_fee" class="text-danger"> {{error.tution_fee[0]}}</p>
                               </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Overseas Student Health Cover  </label> <br>
                               <input type="text"  value="" class="form-control" name="health_fee">
                               <transition name="fade">
                               <p v-if="error.health_fee" class="text-danger"> {{error.health_fee[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Airport Pickup Fee (Optional)  </label> <br>
                               <input type="text"  value="" class="form-control" name="airport_fee">
                               <transition name="fade">
                               <p v-if="error.airport_fee" class="text-danger"> {{error.airport_fee[0]}}</p>
                               </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Additional Services</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Do you require airport pickup? </label> <br>
                               <input type="radio" name="pickup" value="0"> No
                               <input type="radio"  name="pickup"  value="1"> Yes
                                    <i> If yes, please fill a seperate form</i>
                                    <transition name="fade">
                                    <p v-if="error.pickup" class="text-danger"> {{error.pickup[0]}}</p>
                                    </transition>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Do you require assistance with accomodation? </label> <br>
                               <input type="radio" name="acco_assistance" value="0" v-model="acco"> No
                               <input type="radio" name="acco_assistance" value="1"  v-model="acco"> Yes
                                   <br>
                               <label for="" v-if="acco == 1 "> Length Of Stay(week)</label>
                               <input type="text" class="form-control" name="acco_if_yes" v-if="acco == 1">
                               <transition name="fade">
                               <p v-if="error.acco_assistance" class="text-danger"> {{error.acco_assistance[0]}}</p>
                             </transition>

                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Accommodation Start Date </label> <br>
                            <datepicker format="yyyy-MM-dd" name="acco_start_date"  bootstrap-styling  :initialView="'year'" ></datepicker>
                            <transition name="fade">
                            <p v-if="error.acco_start_date" class="text-danger"> {{error.acco_start_date[0]}}</p>
                            </transition>
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                               <input type="radio" name="disability" value="0"  v-model="disable"> No
                               <input type="radio" name="disability" value="1" v-model="disable"> Yes
                                   <br>
                               <label for="" v-if="disable == 1 ">If Yes </label>
                               <input type="text" class="form-control" name="if_disability" v-if="disable == 1">
                               <transition name="fade">
                               <p v-if="error.disability" class="text-danger"> {{error.disability[0]}}</p>
                             </transition>

                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Check List</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Completed all sections of this application form?</label> <br>
                               <input type="radio" name="form_complete" value="1" > Yes
                               <transition name="fade">
                               <p v-if="error.form_complete" class="text-danger"> {{error.form_complete[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copied of your passport visa ?</label> <br>
                               <input type="radio" name="pv_compete" value="1" > Yes
                               <transition name="fade">
                               <p v-if="error.pv_compete" class="text-danger"> {{error.pv_compete[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of your qualifications ?</label> <br>
                               <input type="radio" name="qualifications_complete" value="1" > Yes
                               <transition name="fade">
                               <p v-if="error.qualifications_complete" class="text-danger"> {{error.qualifications_complete[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of English languafe proficiency ?</label> <br>
                               <input type="radio" name="language_complete"  value="1"> Yes
                               <transition name="fade">
                               <p v-if="error.language_complete" class="text-danger"> {{error.language_complete[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed any other certified documents requested in this application forn ?</label> <br>
                               <input type="radio" name="documents_complete"  value="1"> Yes
                               <transition name="fade">
                               <p v-if="error.documents_complete" class="text-danger"> {{error.documents_complete[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Read and ticked/signed the declaration ?</label> <br>
                               <input type="radio" name="all_complete" value="1" > Yes
                               <transition name="fade">
                               <p v-if="error.all_complete" class="text-danger"> {{error.all_complete[0]}}</p>
                               </transition>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">If Student Under Age</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Parent Name</label> <br>
                               <input type="text" name="parent_name" value="" class="form-control">
                               <transition name="fade">
                               <p v-if="error.parent_name" class="text-danger"> {{error.parent_name[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Contact Detail</label> <br>
                               <input type="text" name="contact_detail" value="" class="form-control">
                               <transition name="fade">
                               <p v-if="error.contact_detail" class="text-danger"> {{error.contact_detail[0]}}</p>
                               </transition>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Date</label> <br>
                            <datepicker format="yyyy-MM-dd" name="date"  bootstrap-styling  :initialView="'year'" ></datepicker>
                            <transition name="fade">
                            <p v-if="error.date" class="text-danger"> {{error.date[0]}}</p>
                            </transition>
                        </div>

                       </div>
                       <hr>
                       <div class="row">
                           <div class="col-md-12"><button class="btn btn-success" @click.prevent="submit">
                               Add</button></div>
                       </div>
                    </form>
                </div>
            </div>
        </div>





        </b-card>
      </b-col>
    </b-row>



  </div>
</template>

<script>




  export default {
      data() {
          return{
            error:'',
              date_of_intake_id:'',
              date:'',
              intake_year:'',
              intake_dates:'',
              acco:'',
              disable:'',
                q:['1'],
                n:'',
               courses:'',
               agents:'',
               intakes:'',
         }
      },
      created(){
          this.fetchAgents();
          this.fetchCourses();
          this.fetchIntakes();
          this.n = this.q.length;

      },
      watch:{
          date(){
              console.log('a');
                  let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intakes/find/'+vm.intake_year+'/'+vm.date;
        axios.get(url)
          .then(function(response) {
            vm.date_of_intake_id = response.data.data.id;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

          },
          intake_year(){
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intakes/form/'+vm.intake_year;
        axios.get(url)
          .then(function(response) {
              console.log(response.data.data);
            vm.intake_dates = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

          }
      },
      methods:{
          fetchIntakes(){
    let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intakes/form';
        axios.get(url)
          .then(function(response) {
            vm.intakes = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

          },
          submit(){
                  var self = this;
            var form = self.$refs.admissionForm;
            var formData = new FormData(form);
            let url = self.$root.baseUrl + '/api/admin/form/submit';
            axios.post(url, formData).then(function(response) {
              //reload page
              self.$toastr.s("A form has been submitted.");
              router.push("allStudents")
            })
            .catch(function(error) {
              self.error = '';
              self.error = error.response.data.errors;

            });
          },
          removeQ(a){
    for( var i = 0; i < this.q.length; i++){
            if (this.q[i] === a) {
                this.q.splice(i, 1);
            }
            }
          },
          addQ(){
              this.n++;
        this.q.push(this.n);

          },
           fetchCourses() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/courses';
        axios.get(url)
          .then(function(response) {
            vm.courses = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },
           fetchAgents() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/agent_documents';
        axios.get(url)
          .then(function(response) {
            vm.agents = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },
      }

  }
</script>
