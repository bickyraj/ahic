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
                            <label for=""> Choose A Date</label>
                                <input type="text" name="intake_year" class="form-control" value="2017">
                                <input type="text" name="intake_date" class="form-control" value="2012-02-01">
                        </div>
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course Description</h5>
                        </div>

                        <div class="form-group col-md-12">
                            <label for=""> Choose A Course</label>
                            <select name="course_id" id="" class="form-control">
                                <option  v-for="course in courses" :key="course.id" :value="course.id"> {{course.name}} </option>
                            </select>
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Personal Details</h5>
                                 </div>
                            <div class="row">

                        <div class="form-group col-md-3">
                            <label for="">Title And Family Name</label>
                                    <input type="text" class="form-control" name="familyname" value="Family Name">
                            </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">First Name</label>
                                    <input type="text" name="firstname" class="form-control" value="First">
                         </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control" value="Middle">
                         </div>
                         
                      
                        <div class="form-group col-md-3">
                            <label for="">DOB</label>
                                    <input type="text" name="dob" class="form-control" value="2018-11-07">
                         </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">Gender</label>
                                    <input type="text" name="gender" class="form-control" value="male">
                         </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">Place Of Birth City </label>
                                    <input type="text" name="birth_city" class="form-control" value="ktm">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Country </label>
                                    <input type="text" name="birth_country" class="form-control" value="Nepal">
                         </div>

                        <div class="form-group col-md-3">
                            <label for="">Nationality </label>
                                    <input type="text" name="nationality" class="form-control" value="Nepali">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Passport Number </label>
                                    <input type="text" name="passport_number" class="form-control" value="1234">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Issued Date </label>
                                    <input type="text" name="p_issued_date" class="form-control" value="2012-02-01">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Expired Date </label>
                                    <input type="text" name="p_expired_date" class="form-control" value="2012-02-01">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Place Of Issue </label>
                                    <input type="text" name="place_of_issue" class="form-control" value="place of issue">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Unique Stident Identifier (USI Number) </label>
                                    <input type="text" name="usi_number" class="form-control" value="10018">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">UVisa - Are You In Australia now?  </label> <br>
                                    <input type="radio" value="1" name="in_aus"> YES
                                    <input type="radio" value="0" name="in_aus" checked> NO
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">Visa Category</label>
                                    <input type="text"  class="form-control" name="v_category" value="idk">
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">Visa Expired Date</label>
                                    <input type="text" name="v_exp_date" class="form-control"  value="2018-11-07">
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">At which office are you going to aplly for your visa</label>
                                    <input type="text" name="v_office" class="form-control" value="office">
                         </div>
                            <div class="form-group col-md-9">
                            <label for="">Are You Aboriginal or Torress Strait Islander origin?</label><br>
                                <input type="radio" name="origin" value="0" > No
                                <input type="radio" name="origin" value="1"> Yes, Aboriginal
                                <input type="radio" name="origin" value="2"> Yes, Torress Strait Islander
                                <input type="radio" name="origin" value="3"> Yes, both Aboriginal Torress Strait Islander
                         </div>

                            </div>

                         </div>
                      
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Australia</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control" name="aus_street" value="New Street">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control" name="aus_city" value="New City">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control" name="aus_province" value="Sydney">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control" name="aus_postcode" value="code123">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Email </label>
                                <input type="text" class="form-control" name="aus_email" value="email@aus.gmail.com">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" value="Australia" name="aus_country" >
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="aus_telephone"  value="123456789">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Home Country</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control" name="home_street" value="Siddhipur">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control" name="home_city" value="Lalitpur">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control" name="home_province" value="Bagmati">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control" name="home_email" value="home@gmail.com">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control" name="home_postcode" value="987654">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" name="home_country" value="Nepal">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="home_telephone" value="5581324">
                        </div>
                        
                       </div>
                
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Emergency Contact</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Name</label>
                                <input type="text" class="form-control" name="e_name" value="Emergency Mhzn">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Relationship</label>
                                <input type="text" class="form-control" name="e_relationship" value="Dad">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Address</label>
                                <input type="text" class="form-control" name="e_address" value="California">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="e_telephone" value="55664477558">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Mobile</label>
                                <input type="text" class="form-control" name="e_mobile" value="12346578">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control" name="e_email" value="dad@california.com">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Educational Qualifications <small> <button class="btn btn-success float-right" @click.prevent="addQ">Add</button> </small> </h5>
                        </div>
    <div class="row" v-for="(n,qs) in q" :key="n" :ref="'Q'+n" :use="qs">
    <div class="col-md-12">
        <label for="">Qualification </label> <small> <button class="btn-danger" @click.prevent="removeQ(n)"> Remove </button> </small>
        <input type="text" :value="n">
    </div>

                     <div class="form-group col-md-6">
                            <label for=""> Qualification/Award</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][qualification]'" value="SLC">
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Educational Institution</label>
                                <input type="text" class="form-control"  :name="'edu['+n+'][institution]'" value="Kopila">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Month</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][started_month]'" value="Jan">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Year</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][started_year]'" value="2012">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Month</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][completed_month]'" value="Dec"> 
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Year</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][completed_year]'" value="2018">
                        </div>

    </div>
                    
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Current English Level</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Is English your First Language?</label> <br>
                                <input type="radio" name="eng_lang" checked value="1"> Yes
                                <input type="radio" name="eng_lang" value="0"> No
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Please Provide evidence of your English languafe proficiency.</label> <br>
                                <input type="radio" name="evidence" value="1"> IELTS
                                <input type="radio" name="evidence" value="2"> TOEFL
                                <input type="radio" name="evidence" value="3"> PTE
                                <input type="radio" name="evidence" value="4"> CAE
                                <input type="radio" name="evidence" value="5"> Other
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Score Achieved</label>
                                <input type="text" class="form-control" name="score_achieved" value="100">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Year Taken</label>
                                <input type="text" class="form-control" name="year_taken" value="1997">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Listening</label>
                                <input type="text" class="form-control" name="listening" value="99">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Reading</label>
                                <input type="text" class="form-control" name="reading" value="99">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Writing</label>
                                <input type="text" class="form-control" name="writing" value="88">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Speaking</label>
                                <input type="text" class="form-control" name="speaking" value="78">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Total Score</label>
                                <input type="text" class="form-control" name="total_score" value="100">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Recognition Of Prior Learning</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Based onpast education qualifications, are you going to apply for Recognition of Prior Learning or Based om past Australian VET qualifications, are you going to apply for Credit (CT) (Advanced standing) </label> <br>
                                <input type="radio" name="rpl" checked value="1" > Yes
                                <input type="radio" name="rpl" value="0"> No <br>
                                <i> If yes, pleaserefer to CT and RPL in the International Student Handbook on oir website.</i>
                        </div>
                      
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course and Other Fees</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Application Fee </label> <br>
                               <input type="text"  value="$200" class="form-control" name="application_fee">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Tution Fee </label> <br>
                               <input type="text"  value="$200" class="form-control" name="tution_fee">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Overseas Student Health Cover  </label> <br>
                               <input type="text"  value="$200" class="form-control" name="health_fee">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Airport Pickup Fee (Optional)  </label> <br>
                               <input type="text"  value="$200" class="form-control" name="airport_fee">
                        </div>
                      
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Additional Services</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Do you require airport pickup? </label> <br>
                               <input type="radio" name="pickup" value="0"> No
                               <input type="radio"  name="pickup" checked value="1"> Yes
                                    <i> If yes, please fill a seperate form</i>
                        </div> 

                        <div class="form-group col-md-3">
                            <label for=""> Do you require assistance with accomodation? </label> <br>
                               <input type="radio" name="acco_assistance" value="0"> No
                               <input type="radio" name="acco_assistance" value="1" checked> Yes
                               <!-- <label for=""> Length Of Stay(week)</label> -->
                               <!-- <input type="text" class="form-control" name="acco_if_yes"> -->
                                    <i> If yes, please fill a seperate form</i>
                        </div> 

                        <div class="form-group col-md-3">
                            <label for=""> Accommodation Start Date </label> <br>
                               <input type="text" class="form-control" name="acco_start_date" value="2012-02-12">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                               <input type="radio" name="disability" value="1"> Yes
                               <input type="radio" name="disability" value="0" checked> No
                               <labeL> IF YES</labeL> 
                               <input type="text" class="form-control" name="if_disability">   
                        </div>
                      
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Check List</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Completed all sections of this application form?</label> <br>
                               <input type="radio" name="form_complete" value="1" checked > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copied of your passport visa ?</label> <br>
                               <input type="radio" name="pv_compete" value="1" checked > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of your qualifications ?</label> <br>
                               <input type="radio" name="qualifications_complete" value="1" checked > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of English languafe proficiency ?</label> <br>
                               <input type="radio" name="language_complete"  value="1" checked> Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed any other certified documents requested in this application forn ?</label> <br>
                               <input type="radio" name="documents_complete"  value="1" checked> Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Read and ticked/signed the declaration ?</label> <br>
                               <input type="radio" name="all_complete" value="1" checked > Yes
                        </div> 

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">If Student Under Age</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Parent Name</label> <br>
                               <input type="text" name="parent_name" value="Parent Name" class="form-control"> 
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Contact Detail</label> <br>
                               <input type="text" name="contact_detail" value="12514151" class="form-control"> 
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Date</label> <br>
                               <input type="text" name="date" value="2015-02-04" class="form-control"> 
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
                q:['1'],
                n:'',
               courses:'', 
         }
      },
      created(){
          this.fetchCourses();
              this.n = this.q.length;

      },
      methods:{
          submit(){
                  var self = this;
            var form = self.$refs.admissionForm;
            var formData = new FormData(form);
            let url = self.$root.baseUrl + '/api/admin/form/submit';
            axios.post(url, formData).then(function(response) {
                console.log(response);
            //   self.$toastr.s("A agent agreement process has been edited.");
            })
            .catch(function(error) {
              if (error.response.status === 422) {
                self.$toastr.e(error.response.data.errors.name);
              }
            });
          },
          removeQ(a){
                        for( var i = 0; i < this.q.length; i++){ 
            if ( this.q[i] === a) {
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
      }

  }
</script>