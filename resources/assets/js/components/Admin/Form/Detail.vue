<style lang="">
  .data-head {
    color: white;
    background-color: rgb(30, 106, 161);
    padding-top: 20px;
    padding-bottom: 10px;
    margin-bottom: 20px;
  }

  .data-content p {
    font-size: 1.2em;
    margin-bottom: 20px;
  }
</style>
<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Application</h5>
            </div>
          </div>
          <div v-if="application != null" class="card-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 data-head">
                  <h4> A. Course And Date Of Commencement </h4>
                </div>
                <div class="col-md-12 data-content" v-if="application.date_of_intake != null">
                  <p> Intake Year : {{application.date_of_intake.year}}</p>
                  <p> Inake Date : {{application.date_of_intake.date}} </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> B. Course Chosen </h4>
                </div>
                <div v-if="application.application_course.course != null" class="col-md-12 data-content">
                  <p>Course : {{application.application_course.course.name}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 data-content">
                  <p> Title And Familly Name : {{application.familyname}}</p>
                  <p> First Name : {{application.firstname}}</p>
                  <p> Middle Name : {{application.middlename}}</p>
                  <p> DOB : {{application.dob}}</p>
                  <p> Gender: {{application.gender}}</p>
                  <p> City Of Birth : {{application.birth_city}}</p>
                  <p> Country Of Birth: {{application.birth_country}}</p>
                  <p> In Australia:
                    <span v-if="application.in_australia == '1'"> Yes </span>
                    <span v-if="application.in_australia == '0'"> No </span>
                  </p>
                  <p> Unique Student Identifier (USI number): {{application.usi_number}}</p>
                  <p> Visa Category: {{application.visa_category}}</p>
                  <p> Visa Expired Date: {{application.visa_expired_date}}</p>
                  <p> Visa Office Applying For: {{application.visa_office_applying_for}}</p>
                  <p> Origin:
                    <span v-if="application.islander_origin =='0'"> No </span>
                    <span v-if="application.islander_origin =='1'"> Yes, Aboriginal</span>
                    <span v-if="application.islander_origin =='2'">Yes, Torres Strait Islander</span>
                    <span v-if="application.islander_origin =='3'">Yes, Both Aboriginal Torres Strait Islander</span>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> C. Passport </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p> Nationality : {{application.passport.nationality}}</p>
                  <p> Number : {{application.passport.number}}</p>
                  <p> Issued Date : {{application.passport.issued_date}}</p>
                  <p> Expired Date : {{application.passport.expired_date}}</p>
                  <p> Place Of Issue: {{application.passport.place_of_issue}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> D. Address In AUS </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Street : {{application.aus.street}}</p>
                  <p>City : {{application.aus.city}}</p>
                  <p>Province : {{application.aus.province}}</p>
                  <p>Country : {{application.aus.country}}</p>
                  <p>Telephone : {{application.aus.telephone}}</p>
                  <p>Email : {{application.aus.email}}</p>
                  <p>Post Code : {{application.aus.postcode}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> E. Address In Home </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Street : {{application.home.street}}</p>
                  <p>City : {{application.home.city}}</p>
                  <p>Province : {{application.home.province}}</p>
                  <p>Country : {{application.home.country}}</p>
                  <p>Telephone : {{application.home.telephone}}</p>
                  <p>Email : {{application.home.email}}</p>
                  <p>Post Code : {{application.home.postcode}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> F. Emergency Contact </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Name : {{application.econtact.name}}</p>
                  <p>Relationship : {{application.econtact.relationship}}</p>
                  <p>Address : {{application.econtact.address}}</p>
                  <p>Telephone : {{application.econtact.telephone}}</p>
                  <p>Mobile: {{application.econtact.mobile}}</p>
                  <p>Email: {{application.econtact.email}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> G. Educational Qualification </h4>
                </div>
                <div class="col-md-12 data-content">
                  <div class="col-md-4 pull-left" v-for="edu in application.edu" :key="edu.id">
                    <p> Qualification : {{edu.qualification}}</p>
                    <p> Institution : {{edu.educational_institution}}</p>
                    <p> Start Year : {{edu.start_year}}</p>
                    <p> Start Month : {{edu.start_month}}</p>
                    <p> Completed Year: {{edu.completed_year}}</p>
                    <p> Completed Month : {{edu.completed_month}}</p>
                    <hr>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> H. Current English Level </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p> English First Language :
                    <span v-if="application.english.english_first_lang == 1">
                    Yes, English as first language </span>
                    <span v-else> No</span>
                  </p>

                  <p> English Language Test :
                    <span v-if="application.english.english_lang_test =='0'"> IELTS</span>
                    <span v-if="application.english.english_lang_test =='1'"> TOEFL</span>
                    <span v-if="application.english.english_lang_test =='2'"> PTE</span>
                    <span v-if="application.english.english_lang_test =='3'"> CAE</span>
                    <span v-if="application.english.english_lang_test =='4'"> Other</span>
                  </p>
                  <p> Score Achieved : {{application.english.score_achieved}}</p>
                  <p> Year Taken : {{application.english.year_taken}}</p>
                  <p> Listening : {{application.english.listening}}</p>
                  <p> Reading : {{application.english.reading}}</p>
                  <p> Writing : {{application.english.writing}}</p>
                  <p> Speaking : {{application.english.speaking}}</p>
                  <p> Total Score : {{application.english.total_score}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> I. Recognition of Prior Learning </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Status :
                    <span v-if="application.rpl.status == '1'"> Yes</span>
                    <span v-if="application.rpl.status == '0'"> No</span>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> J. Additional Services </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Airport Pickup :

                    <span v-if="application.services.airport_pickup == 1">
                    Yes </span>
                    <span v-else> No</span>
                  </p>
                  <p>Assistance With Accomodation :

                                        <span v-if="application.services.assistance_with_accomodation == 1">
                                        Yes </span>
                                        <span v-else> No</span>
                                      </p>
                  <p>Accommodation Start Date : {{application.services.accomodation_start_date}}</p>
                  <p>Disability :
                    <span v-if="application.services.disability == '1'"> Yes</span>
                    <span v-if="application.services.disability == '0'"> No</span>
                  </p>
                  <p>If Disability :
                    <span v-if="application.services.if_disability"> {{application.services.if_disability}} </span>
                    <span v-else> -- </span>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> K. Course Chose And Other Fees </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Application Fee : {{application.fee.application_fee}}</p>
                  <p>Tution Fee : {{application.fee.tution_fee}}</p>
                  <p>Overseas Student Health Cover : {{application.fee.overseas_student_health_cover}}</p>
                  <p>Airprt Pickup Fee: {{application.fee.airport_pickup_fee}}</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> L. Check List </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Compled All Form :<span v-if="application.checklist.completed_all_form == 1">Yes </span><span v-else> No</span></p>
                  <p>Enclosed Certified Passport And Visa :<span v-if="application.checklist.enclosed_certified_passport_and_visa == 1">Yes </span><span v-else> No</span></p>
                  <p>Enclosed Certified Qualification: <span v-if="application.checklist.enclosed_qualification == 1">Yes </span><span v-else> No</span></p>
                  <p>Enclosed Certified English Language Proficiency :<span v-if="application.checklist.enclosed_english_lang_proficiency == 1">Yes </span><span v-else> No</span></p>
                  <p>Enclosed Certified Documents :  <span v-if="application.checklist.enclosed_certified_documents == 1">Yes </span><span v-else> No</span></p>
                  <p>Read And Ticked Declaration : <span v-if="application.checklist.read_ticked_declaration == 1">Yes </span><span v-else> No</span></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12  data-head">
                  <h4> M. Student If Under Age </h4>
                </div>
                <div class="col-md-12 data-content">
                  <p>Parent Name: {{application.underage.parent_name}}</p>
                  <p>Contact Detail : {{application.underage.contact_detail}}</p>
                  <p>Date : {{application.underage.date}}</p>
                </div>
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
      return {
        loading: true,
        application: null,
        table_items: null,
        pages: [],
        menu_table_fields: ['name', 'parent_id', 'page_id', 'parent_menu'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchAdmission();
    },
    computed: {},
    methods: {
      fetchAdmission() {
        let vm = this;
        let self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/application_form/';
        axios.get(url + id).then(function(response) {
            vm.application = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            // console.log(error);
            vm.loading = false;
          });
      },
    },
  }
</script>
