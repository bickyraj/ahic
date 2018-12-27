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
          <div class="card-body">
            <form action="" ref="admissionForm">
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Course And Date Commencement</h5>
                </div>
                <div class="form-group col-md-12">
                  <label for=""> Choose A Year</label>
                  <select name="intake_year" id="" v-model="intake_year" class="form-control">
                    <option value="" selected>Select A Year </option>
                    <option v-for="intake in intakes" :key="intake.id" :value="intake.year">{{intake.year}} </option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for=""> Choose A Date</label>
                  <select name="intake_date" id="" v-model="date" class="form-control">
                    <option selected value="">Select A Date </option>
                    <option v-for="intake_date in intake_dates" :key="intake_date.id" :value="intake_date.date">{{intake_date.date}} </option>
                  </select>
                  <input type="hidden" v-model="date_of_intake_id" name="intake_id">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Course Description</h5>
                </div>
                <div class="form-group col-md-12">
                  <label for=""> Choose A Course</label>
                  <select name="course_id" id="" class="form-control">
                    <option selected> Choose A Course</option>
                    <option v-for="course in courses" :key="course.id" :value="course.id"> {{course.name}} </option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for=""> Choose Agent </label>
                  <select name="company_id" id="" class="form-control">
                    <option selected> Choose Agent</option>
                    <option v-for="company in agents" :key="company.id" :value="company.id"> {{company.company_name}} </option>
                  </select>
                </div>
              </div>
              <hr>
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
                    <datepicker format="yyyy-MM-dd" name="dob" bootstrap-styling :initialView="'year'"></datepicker>
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
                    <datepicker format="yyyy-MM-dd" name="p_issued_date" bootstrap-styling :initialView="'year'"></datepicker>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Expired Date </label>
                    <datepicker format="yyyy-MM-dd" name="p_expired_date" bootstrap-styling :initialView="'year'"></datepicker>
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
                    <label for="">UVisa - Are You In Australia now? </label> <br>
                    <input type="radio" value="1" name="in_aus"> YES
                    <input type="radio" value="0" name="in_aus" checked> NO
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Visa Category</label>
                    <input type="text" class="form-control" name="v_category" value="idk">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">Visa Expired Date</label>
                    <datepicker format="yyyy-MM-dd" name="v_exp_date" bootstrap-styling :initialView="'year'"></datepicker>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="">At which office are you going to apply for your visa</label>
                    <input type="text" name="v_office" class="form-control" value="office">
                  </div>
                  <div class="form-group col-md-9">
                    <label for="">Are You Aboriginal or Torress Strait Islander origin?</label><br>
                    <input type="radio" name="origin" value="0"> No
                    <input type="radio" name="origin" value="1"> Yes, Aboriginal
                    <input type="radio" name="origin" value="2" checked> Yes, Torress Strait Islander
                    <input type="radio" name="origin" value="3"> Yes, both Aboriginal Torress Strait Islander
                  </div>
                </div>
              </div>
              <hr>
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
                  <input type="text" class="form-control" value="Australia" name="aus_country">
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Telephone</label>
                  <input type="text" class="form-control" name="aus_telephone" value="123456789">
                </div>
              </div>
              <hr>
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
              <hr>
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
              <hr>
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Educational Qualifications <small> <button class="btn btn-success float-right" @click.prevent="addQ">Add</button> </small> </h5>
                </div>
                <div class="row" v-for="(n,qs) in q" :key="n" :ref="'Q'+n" :use="qs">
                  <div class="col-md-12">
                    <label for="">Qualification </label> <small> <button class="btn-danger" @click.prevent="removeQ(n)"> Remove </button> </small>
                    <!-- <input type="text" :value="n"> -->
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""> Qualification/Award</label>
                    <input type="text" class="form-control" :name="'edu['+n+'][qualification]'" value="SLC">
                  </div>
                  <div class="form-group col-md-6">
                    <label for=""> Educational Institution</label>
                    <input type="text" class="form-control" :name="'edu['+n+'][institution]'" value="Kopila">
                  </div>
                  <div class="form-group col-md-3">
                    <label for=""> Started Month</label>
                    <datepicker format="MM" :name="'edu['+n+'][started_month]'" bootstrap-styling :minimumView="'month'" :maximumView="'month'" :initialView="'month'"></datepicker>
                  </div>
                  <div class="form-group col-md-3">
                    <label for=""> Started Year</label>
                    <datepicker format="yyyy" :name="'edu['+n+'][started_year]'" bootstrap-styling :minimumView="'year'" :maximumView="'year'" :initialView="'year'"></datepicker>
                  </div>
                  <div class="form-group col-md-3">
                    <label for=""> Completed Month</label>
                    <datepicker format="MM" :name="'edu['+n+'][completed_month]'" bootstrap-styling :minimumView="'month'" :maximumView="'month'" :initialView="'month'"></datepicker>
                  </div>
                  <div class="form-group col-md-3">
                    <label for=""> Completed Year</label>
                    <datepicker format="yyyy" :name="'edu['+n+'][completed_year]'" bootstrap-styling :minimumView="'year'" :maximumView="'year'" :initialView="'year'"></datepicker>
                  </div>
                </div>
              </div>
              <hr>
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
                  <input type="radio" name="evidence" value="2" checked> TOEFL
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
              <hr>
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Recognition Of Prior Learning</h5>
                </div>
                <div class="form-group col">
                  <label for=""> Based onpast education qualifications, are you going to apply for Recognition of Prior Learning or Based om past Australian VET qualifications, are you going to apply for Credit (CT) (Advanced standing) </label> <br>
                  <input type="radio" name="rpl" checked value="1"> Yes
                  <input type="radio" name="rpl" value="0"> No <br>
                  <i> If yes, pleaserefer to CT and RPL in the International Student Handbook on oir website.</i>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Course and Other Fees</h5>
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Application Fee </label> <br>
                  <input type="text" value="$200" class="form-control" name="application_fee">
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Tution Fee </label> <br>
                  <input type="text" value="$200" class="form-control" name="tution_fee">
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Overseas Student Health Cover </label> <br>
                  <input type="text" value="$200" class="form-control" name="health_fee">
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Airport Pickup Fee (Optional) </label> <br>
                  <input type="text" value="$200" class="form-control" name="airport_fee">
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Additional Services</h5>
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Do you require airport pickup? </label> <br>
                  <input type="radio" name="pickup" value="0"> No
                  <input type="radio" name="pickup" checked value="1"> Yes
                  <i> If yes, please fill a seperate form</i>
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Do you require assistance with accomodation? </label> <br>
                  <input type="radio" name="acco_assistance" value="0" v-model="acco"> No
                  <input type="radio" name="acco_assistance" value="1" checked v-model="acco"> Yes
                  <transition name="fade">
                    <br>
                    <label for="" v-if="acco == 1 "> Length Of Stay(week)</label>
                    <input type="text" class="form-control" name="acco_if_yes" v-if="acco == 1">
                  </transition>
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Accommodation Start Date </label> <br>
                  <datepicker format="yyyy-MM-dd" name="acco_start_date" bootstrap-styling :initialView="'year'"></datepicker>
                </div>
                <div class="form-group col-md-3">
                  <label for=""> Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                  <input type="radio" name="disability" value="0" checked v-model="disable"> No
                  <input type="radio" name="disability" value="1" v-model="disable"> Yes
                  <transition name="fade">
                    <br>
                    <label for="" v-if="disable == 1 ">If Yes </label>
                    <input type="text" class="form-control" name="if_disability" v-if="disable == 1">
                  </transition>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12 bg-primary p-3 mb-1">
                  <h5 class="">Check List</h5>
                </div>
                <div class="form-group col-md-6">
                  <label for=""> Completed all sections of this application form?</label> <br>
                  <input type="radio" name="form_complete" value="1" checked> Yes
                </div>
                <div class="form-group col-md-6">
                  <label for=""> Attached/enclosed certificed copied of your passport visa ?</label> <br>
                  <input type="radio" name="pv_compete" value="1" checked> Yes
                </div>
                <div class="form-group col-md-6">
                  <label for=""> Attached/enclosed certificed copies of your qualifications ?</label> <br>
                  <input type="radio" name="qualifications_complete" value="1" checked> Yes
                </div>
                <div class="form-group col-md-6">
                  <label for=""> Attached/enclosed certificed copies of English languafe proficiency ?</label> <br>
                  <input type="radio" name="language_complete" value="1" checked> Yes
                </div>
                <div class="form-group col-md-6">
                  <label for=""> Attached/enclosed any other certified documents requested in this application forn ?</label> <br>
                  <input type="radio" name="documents_complete" value="1" checked> Yes
                </div>
                <div class="form-group col-md-6">
                  <label for=""> Read and ticked/signed the declaration ?</label> <br>
                  <input type="radio" name="all_complete" value="1" checked> Yes
                </div>
              </div>
              <hr>
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
                  <datepicker format="yyyy-MM-dd" name="date" bootstrap-styling :initialView="'year'"></datepicker>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-12"><button class="btn btn-success" @click.prevent="submit">
                    Add</button></div>
              </div>
            </form>
          </div>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        date_of_intake_id: '',
        date: '',
        intake_year: '',
        intake_dates: '',
        acco: '',
        disable: '',
        q: ['1'],
        n: '',
        courses: '',
        agents: '',
        intakes: '',
      }
    },
    created() {
      this.fetchAgents();
      this.fetchCourses();
      this.fetchIntakes();
      this.n = this.q.length;
    },
    watch: {
      date() {
        console.log('a');
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intakes/find/' + vm.intake_year + '/' + vm.date;
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
      intake_year() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intakes/form/' + vm.intake_year;
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
    methods: {
      fetchIntakes() {
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
      submit() {
        var self = this;
        var form = self.$refs.admissionForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/form/submit';
        axios.post(url, formData).then(function(response) {
            console.log(response);
            self.$toastr.s("A form has been submitted.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      removeQ(a) {
        for (var i = 0; i < this.q.length; i++) {
          if (this.q[i] === a) {
            this.q.splice(i, 1);
          }
        }
      },
      addQ() {
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