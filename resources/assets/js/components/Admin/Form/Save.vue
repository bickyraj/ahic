
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
                            <p> Intake Year</p>
                            <datepicker format="yyyy" name="intake_year" bootstrap-styling  :minimumView="'year'" :maximumView="'year'" :initialView="'year'" ></datepicker>
                            <p> Intake Date</p>
                            <datepicker format="dd" name="intake_date"  bootstrap-styling :minimumView="'month'" :maximumView="'year'" :initialView="'year'" ></datepicker>
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


                        <div class="form-group col-md-12">
                            <label for=""> Choose Agent </label>
                            <select name="agent_id" id="" class="form-control">
                                <option  v-for="course in agents" :key="course.id" :value="course.id"> {{course.company_name}} </option>
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
                                    <input type="text" name="p_issued_date" class="form-control" value="10/21/2018">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Expired Date </label>
                                    <input type="text" name="p_expired_date" class="form-control" value="10/21/2018">
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
                                <input type="radio" name="origin" value="0" checked> No
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
                                <input type="text" class="form-control" name="aus_street">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control" name="aus_city">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control" name="aus_province">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control" name="aus_postcode">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Email </label>
                                <input type="text" class="form-control" name="aus_email">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" value="Australia" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="aus_telephone">
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Home Country</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control" name="home_street">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control" name="home_city">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control" name="home_province">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control" name="home_email">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control" name="home_postcode">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" value="" name="home_country" >
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="home_telephone">
                        </div>

                       </div>

                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Emergency Contact</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Name</label>
                                <input type="text" class="form-control" name="e_name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Relationship</label>
                                <input type="text" class="form-control" name="e_reln">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Address</label>
                                <input type="text" class="form-control" name="e_address">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control" name="e_telephone">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Mobile</label>
                                <input type="text" class="form-control" name="e_mobile">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control" name="e_email">
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
                                <input type="text" class="form-control" :name="'edu['+n+'][qualitification]'" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Educational Institution</label>
                                <input type="text" class="form-control"  :name="'edu['+n+'][institutuin]'" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Month</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][started_month]'">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Year</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][started_year]'">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Month</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][completed_month]'">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Year</label>
                                <input type="text" class="form-control" :name="'edu['+n+'][completed_month]'">
                        </div>

    </div>


                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Current English Level</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Is English your First Language?</label> <br>
                                <input type="radio" name="eng_lang"> Yes
                                <input type="radio" name="eng_lang"> No
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Please Provide evidence of your English languafe proficiency.</label> <br>
                                         <input type="radio" name="evidence"> IELTS
                                <input type="radio" name="evidence"> TOEFL
                                <input type="radio" name="evidence"> PTE
                                <input type="radio" name="evidence"> CAE
                                <input type="radio" name="evidence"> Other
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Score Achieved</label>
                                <input type="text" class="form-control" name="score_achieved">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Year Taken</label>
                                <input type="text" class="form-control" name="year_taken">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Listening</label>
                                <input type="text" class="form-control" name="listening">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Reading</label>
                                <input type="text" class="form-control" name="reading">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Writing</label>
                                <input type="text" class="form-control" name="writing">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Speaking</label>
                                <input type="text" class="form-control" name="speaking">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Total Score</label>
                                <input type="text" class="form-control" name="total_score">
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Recognition Of Prior Learning</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Based onpast education qualifications, are you going to apply for Recognition of Prior Learning or Based om past Australian VET qualifications, are you going to apply for Credit (CT) (Advanced standing) </label> <br>
                                <input type="radio" name="rpl" > Yes
                                <input type="radio" name="rpl" > No <br>
                                <i> If yes, pleaserefer to CT and RPL in the International Student Handbook on oir website.</i>
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course and Other Fees</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Application Fee </label> <br>
                               <input type="text" disabled value="$200" class="form-control" name="application_fee">
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
                               <input type="radio" name="pickup" > No
                               <input type="radio"  name="pickup"> Yes
                                    <i> If yes, please fill a seperate form</i>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Do you require assistance with accomodation? </label> <br>
                               <input type="radio" name="acco_assistance" > No
                               <input type="radio" name="acco_assistance" > Yes
                               <label for=""> Length Of Stay(week)</label>
                               <input type="text" class="form-control" name="acco_if_yes">
                                    <i> If yes, please fill a seperate form</i>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Accommodation Start Date </label> <br>
                               <input type="text"  class="form-control" name="acco_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                               <input type="radio" name="disability"> Yes
                               <input type="radio" name="disability"> No
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
                               <input type="radio" name="form_complete" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copied of your passport visa ?</label> <br>
                               <input type="radio" name="pv_compete" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of your qualifications ?</label> <br>
                               <input type="radio" name="qualifications_complete" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of English languafe proficiency ?</label> <br>
                               <input type="radio" name="language_complete" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed any other certified documents requested in this application forn ?</label> <br>
                               <input type="radio" name="documents_complete" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Read and ticked/signed the declaration ?</label> <br>
                               <input type="radio" name="all_complete" > Yes
                        </div>

                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">If Student Under Age</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Parent Name</label> <br>
                               <input type="text" name="parent_name" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Contact Detail</label> <br>
                               <input type="text" name="contact_detail" > Yes
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Date</label> <br>
                               <input type="text" name="date" > Yes
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
               agents:'',
               courses:'',
         }
      },
      created(){
          this.fetchCourses();
          this.fetchAgents();
              this.n = this.q.length;
var els = $('.vdp-datepicker').find('input');
$('.vdp-datepicker').find('input').addClass('form-control');
console.log(els);


      },
      methods:{
          formatter(date){
              return moment(date).format('yyyy-MM-dd');
          },
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
