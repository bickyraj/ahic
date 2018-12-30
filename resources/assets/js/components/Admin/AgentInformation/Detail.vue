<style lang="" scoped>
.no-m-p {
  padding: 0px !important;
  margin: 0px !important;
}

.caption {
  width: 100%;
}
.table tbody + tbody {
  border-top: 1px solid #a4b7c1;
}

.students_list{
  max-height:200px !important;
  /* height:418px !important; */
  overflow-y:scroll;
}

</style>
<template>
  <div class="animated">
    <div v-if="loading"> loading...</div>
    <div v-else>
      <b-row>
        <div class="col-md-6 float-left">
          <b-card class="trump-card ">
            <div class="">
              <div class="card-title">
                <div class="caption">
                  <h5><i class="fas fa-user-tie"></i>  Agent Detail <small class="float-right"> <button class="btn btn-sm btn-success" @click="showEditAgentModal"> Edit </button> </small></h5>
                </div>
              </div>
              <table class="table agent-detail-table table-borderless">
                <tr>
                  <th class=""> Name <span class="float-right">:</span> </th>
                  <td class=""> {{agent.first_name}} {{agent.last_name}} </td>
                </tr>
                <tr>
                  <th class=""> Address <span class="float-right">:</span> </th>
                  <td class=""> {{agent.address}}</td>
                </tr>
                <tr>
                  <th class=""> Telephone <span class="float-right">:</span> </th>
                  <td class=""> {{agent.telephone || '--' }}</td>
                </tr>
                <tr>
                  <th class=""> Mobile No <span class="float-right">:</span> </th>
                  <td class=""> {{agent.mobile_no || '--' }}</td>
                </tr>
                <tr>
                  <th class=""> Email <span class="float-right">:</span> </th>
                  <td class=""> {{agent.email}}</td>
                </tr>
                <tr>
                  <th class=""> Start Date <span class="float-right">:</span> </th>
                  <td class=""> {{agent.start_date}}</td>
                </tr>
              </table>
              <p class="pt-3" v-html="agent.description"></p>
            </div>
          </b-card>
        </div>
        <div class="col-md-6 float-left admin-right">
          <b-card class="trump-card ">
            <div class="">
              <div class="card-title">
                <div class="caption">
                  <h5><i class="fas fa-users"></i> Student Report<small class="float-right">
                    <select name="student_year" id="" class="form-control" v-model="student_filter">
                      <option value="2017" > 2017 </option>
                      <option value="2018">2018 </option>
                      <option value="2019"> 2019 </option>
                      <option value="2020"> 2020 </option>
                    </select>
                  </small></h5>
                </div>
              </div>
              <table class="table trump-table">
                <tr>
                  <th> Name </th>
                </tr>
                <tbody class="students_list">
                <tr v-for="student in filterStudents">
                  <td>{{student.firstname}} </td>
                </tr>
                </tbody>
              </table>
            </div>
          </b-card>
        </div>
      </b-row>
      <b-row>
        <div class="col-md-12" v-for="company in companies" :key="company.id">
          <b-card class="mb-2 trump-card ">
            <div class="card-title">
              <div class="caption">
                <h5>
                  <i class="fas fa-building"></i> Company Details<small class="float-right"></small>
                  <button class="btn btn-sm btn-primary float-right" @click="showAddCompanyModal"> Add A Company </button>
                </h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                <table class="table table-borderless col-md-10">
                  <tr>
                    <th class="col-md-1"> Company Name <span class="float-right">:</span> </th>
                    <td class="col-md-8"> {{company.company_name}} </td>
                  </tr>
                  <tr>
                    <th class="col-md-2"> Address <span class="float-right">:</span> </th>
                    <td class="col-md-8"> {{company.location}}</td>
                  </tr>
                </table>
              </div>
              <div class="col-md-2">
                <img  v-if="agent.logo" :src="$root.baseUrl+'/public/images/agents/'+agent.logo" alt="" class="img-fluid">
                <img  v-else :src="$root.baseUrl+'/public/ahic/img/logo-black.png'" alt="" style="max-height:100px">
              </div>
              <hr>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6 float-left" style="border-right:1px solid rgba(0,0,0,0.1)">
                <b-card class="row mb-2 trump-card " >
                  <div class="col-md-12">
                    <div class="card-title">
                      <div class="caption">
                        <h5><i class="fas fa-key"></i> Agent Document <small class="float-right"> <button class="btn btn-sm btn-success" @click="showEditDocumentModal(company.id)"> Edit</button> </small> </h5>
                      </div>
                    </div>
                    <table class="table table-borderless">
                      <tr>
                        <th class="col-md-1"> EOI <span class="float-right">:</span> </th>
                        <a :href="$root.baseUrl+'/public/images/documents/'+company.EOI" download>
                          <td class="col-md-8"> {{company.EOI}} </td>
                        </a>
                      </tr>
                      <tr>
                        <th class="col-md-2"> ABN <span class="float-right">:</span> </th>
                        <a :href="$root.baseUrl+'/public/images/documents/'+company.ABN" download>
                          <td class="col-md-8"> {{company.ABN}}</td>
                        </a>
                      </tr>
                      <tr>
                        <th class="col-md-2"> Reference <span class="float-right">:</span> </th>
                        <a :href="$root.baseUrl+'/public/images/documents/'+company.reference" download>
                          <td class="col-md-8"> {{company.reference}}</td>
                        </a>
                      </tr>
                      <tr>
                        <th class="col-md-3"> Qualification <span class="float-right">:</span> </th>
                        <a :href="$root.baseUrl+'/public/images/documents/'+company.qualification" download>
                          <td class="col-md-8"> {{company.qualification}}</td>
                        </a>
                      </tr>
                      <tr>
                        <th class="col-md-2"> Profile <span class="float-right">:</span> </th>
                        <a :href="$root.baseUrl+'/public/images/documents/'+company.profile" download>
                          <td class="col-md-8"> {{company.profile}}</td>
                        </a>
                      </tr>
                    </table>
                    <p class="pt-3" v-html="agent.description"></p>
                  </div>
                </b-card>
              </div>
              <div class="col-md-6 float-left">
                <b-card class="row mb-2 trump-card ">
                  <div class="col-md-12">
                    <div class="card-title">
                      <div class="caption">
                        <h5><i class="fas fa-key"></i>  Agreement Process<small class="float-right">
                          <button class="btn btn-sm btn-success" @click="showEditProcessModal(company.process.id)" v-if="company.process"> Edit</button>
                          <button class="btn btn-sm btn-success" @click="showAddProcessModal(company.id)" v-else> Add</button> </small> </h5>
                        </div>
                      </div>
                      <div v-if="company.process">
                        <table class="table table-borderless">
                          <tr>
                            <th class="col-md-4"> Sent Date <span class="float-right">:</span> </th>
                            <td class="col-md-8"> {{company.process.sent_date}} </td>
                          </tr>
                          <tr>
                            <th class="col-md-4"> Agreement <span class="float-right">:</span> </th>
                            <td class="col-md-8"> {{company.process.agreement}} </td>
                          </tr>
                          <tr>
                            <th class="col-md-4"> Recieve Date <span class="float-right">:</span> </th>
                            <td class="col-md-8"> {{company.process.received_date}} </td>
                          </tr>
                          <tr>
                            <th class="col-md-4"> Signed <span class="float-right">:</span> </th>
                            <td class="col-md-8"> {{company.process.signed}} </td>
                          </tr>
                        </table>
                      </div>
                      <p class="pt-3" v-html="agent.description"></p>
                    </div>
                  </b-card>
                </div>
              </div>
              <!-- </div> -->
            </b-card>
          </div>
        </b-row>
        <b-modal class="ess-modal" ref="editAgentModal" hide-footer title="Edit Agent">
          <form @submit.prevent="editAgent" ref="editAgentForm">
            <input type="hidden" name="id" :value="agent.id">
            <div class="form-group">
              <label for=""> PAN</label>
              <input type="text" name="pan" class="form-control" :value="agent.pan">
              <transition name="fade">
                <p v-if="error.pan" class="text-danger"> {{error.pan[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> First Name </label>
              <input type="text" name="first_name" class="form-control" :value="agent.first_name">
              <transition name="fade">
                <p v-if="error.first_name" class="text-danger"> {{error.first_name[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Last Name </label>
              <input type="text" name="last_name" class="form-control" :value="agent.last_name">
              <transition name="fade">
                <p v-if="error.last_name" class="text-danger"> {{error.last_name[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for="">Logo </label>
              <div>
                <croppa v-model="myCroppa" :width="200" :height="200" :initial-image="cropimage" placeholder="click to choose an image" :placeholder-font-size="14" :disabled="false" :quality="1" :prevent-white-space="true">
                </croppa>
              </div>
            </div>
            <div class="form-group">
              <label for=""> Telephone </label>
              <input type="text" name="telephone" class="form-control" :value="agent.telephone">
              <transition name="fade">
                <p v-if="error.telephone" class="text-danger"> {{error.telephone[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Mobile Number </label>
              <input type="text" name="mobile_no" class="form-control" :value="agent.mobile_no">
              <transition name="fade">
                <p v-if="error.mobile_no" class="text-danger"> {{error.mobile_no[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Email </label>
              <input type="text" name="email" class="form-control" :value="agent.email">
              <transition name="fade">
                <p v-if="error.email" class="text-danger"> {{error.email[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Address </label>
              <gmap-autocomplete class="form-control" :value="agent.address" name="address"></gmap-autocomplete>
              <!-- <input type="text" name="address" class="form-control" :value="agent.address"> -->
              <transition name="fade">
                <p v-if="error.address" class="text-danger"> {{error.address[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Start Date </label>
              <datepicker format="yyyy-MM-dd" name="start_date" bootstrap-styling :initialView="'year'" :value="agent.start_date"></datepicker>
              <transition name="fade">
                <p v-if="error.start_date" class="text-danger"> {{error.start_date[0]}}</p>
              </transition>
            </div>
            <b-btn class="mt-3 pull-right" variant="primary" type="submit">Save Agent</b-btn>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditAgentModal">Cancel</b-btn>
          </form>
        </b-modal>
        <b-modal class="ess-modal" ref="addCompanyModal" hide-footer title="Add Company">
          <form @submit.prevent="addCompany" ref="addCompanyForm">
            <input type="hidden" name="agent_id" :value="agent.id">
            <div class="form-group">
              <label for=""> Company Name</label>
              <input type="text" name="company_name" class="form-control">
              <transition name="fade">
                <p v-if="error.company_name" class="text-danger"> {{error.company_name[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> EOI </label>
              <input type="file" name="EOI" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> ABN</label>
              <input type="file" name="ABN" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Reference </label>
              <input type="file" name="reference" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Qualification </label>
              <input type="file" name="qualification" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Profile </label>
              <input type="file" name="profile" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Address </label>
              <gmap-autocomplete class="form-control" name="address"></gmap-autocomplete>
              <transition name="fade">
                <p v-if="error.address" class="text-danger"> {{error.address[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Country </label>
              <select name="country" id="" class="form-control" @change="changeLocation">
                <option value=""> Choose A Country</option>
                <option v-for="(country,index) in countries" :value="country.name" :key="country.id" :index="index"> {{country.name}} </option>
              </select>
              <transition name="fade">
                <p v-if="error.country" class="text-danger"> {{error.country[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Location </label>
              <select name="location" id="" class="form-control">
                <option value=""> Choose A Location</option>
                <option v-for="country in locations" :value="country.location" :key="country.id"> {{country.location}} </option>
              </select>
              <transition name="fade">
                <p v-if="error.location" class="text-danger"> {{error.location[0]}}</p>
              </transition>
            </div>
            <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Company</b-btn>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideAddCompanyModal">Cancel</b-btn>
          </form>
        </b-modal>
        <b-modal class="ess-modal" ref="editDocumentModal" hide-footer title="Edit Agent Document">
          <form @submit.prevent="editDocument" ref="editDocumentForm">
            <input type="hidden" name="id" :value="document.id">
            <div class="form-group">
              <label for=""> Company Name</label>
              <input type="text" name="company_name" class="form-control" :value="document.company_name">
            </div>
            <div class="form-group">
              <label for=""> Address</label>
              <gmap-autocomplete class="form-control" name="address" :value="document.address"></gmap-autocomplete>
            </div>
            <div class="form-group">
              <label for=""> Country </label>
              <select name="country" id="" class="form-control" @change="changeLocation" @load="changeLocation" v-model="document.country">
                <option value=""> Choose A Country</option>
                <option v-for="(country,index) in countries" :value="country.name" :key="country.name" :index="index"> {{country.name}} </option>
              </select>
            </div>
            <div class="form-group">
              <label for=""> Location </label>
              <select name="location" id="" class="form-control" :value="document.location">
                <option value=""> Choose A Location</option>
                <option v-for="country in locations" :value="country.location" :key="country.id"> {{country.location}} </option>
              </select>
            </div>
            <div class="form-group">
              <label for=""> EOI </label>
              <input type="file" name="EOI" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> ABN</label>
              <input type="file" name="ABN" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Reference </label>
              <input type="file" name="reference" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Qualification </label>
              <input type="file" name="qualification" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Profile </label>
              <input type="file" name="profile" class="form-control">
            </div>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="primary" type="submit">Edit Document</b-btn>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="danger" @click.stop="deleter(document.id)">Delete</b-btn>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditDocumentModal">Cancel</b-btn>
          </form>
        </b-modal>
        <b-modal class="ess-modal" ref="addProcessModal" hide-footer title="Add Agreement Process">
          <form @submit.prevent="addProcess" ref="addProcessForm">
            <input type="hidden" name="agent_id" :value="agent.id">
            <input type="hidden" name="agent_document_id" :value="companyid">
            <div class="form-group">
              <label for=""> Sent Date</label>
              <datepicker format="yyyy-MM-dd" name="sent_date" bootstrap-styling :initialView="'year'"></datepicker>
              <transition name="fade">
                <p v-if="error.sent_date" class="text-danger"> {{error.sent_date[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Agreement </label>
              <input type="file" name="agreement" class="form-control">
              <transition name="fade">
                <p v-if="error.agreement" class="text-danger"> {{error.agreement[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Recieved Date </label>
              <datepicker format="yyyy-MM-dd" name="received_date" bootstrap-styling :initialView="'year'"></datepicker>
              <transition name="fade">
                <p v-if="error.received_date" class="text-danger"> {{error.received_date[0]}}</p>
              </transition>
            </div>
            <div class="form-group">
              <label for=""> Signed </label>
              <input type="text" name="signed" class="form-control">
              <transition name="fade">
                <p v-if="error.signed" class="text-danger"> {{error.signed[0]}}</p>
              </transition>
            </div>
            <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Process</b-btn>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideAddProcessModal">Cancel</b-btn>
          </form>
        </b-modal>
        <b-modal class="ess-modal" ref="editProcessModal" hide-footer title="Edit Agreement Process">
          <form @submit.prevent="editProcess" ref="editProcessForm">
            <input type="hidden" name="id" :value="process.id">
            <div class="form-group">
              <label for=""> Sent Date</label>
              <datepicker format="yyyy-MM-dd" name="sent_date" bootstrap-styling :initialView="'year'" :value="process.sent_date"></datepicker>
            </div>
            <div class="form-group">
              <label for=""> Agreement </label>
              <input type="file" name="agreement" class="form-control">
            </div>
            <div class="form-group">
              <label for=""> Recieved Date </label>
              <datepicker format="yyyy-MM-dd" name="received_date" bootstrap-styling :initialView="'year'" :value="process.received_date"></datepicker>
            </div>
            <div class="form-group">
              <label for=""> Signed </label>
              <input type="text" name="signed" class="form-control" :value="process.signed">
            </div>
            <b-btn class="mt-3 pull-right" variant="primary" type="submit">Edit Process</b-btn>
            <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditProcessModal">Cancel</b-btn>
          </form>
        </b-modal>
      </div>
    </div>
  </template>
  <script>
  import moment from 'moment'
  export default {
    data() {
      return {
        student_filter:2018,
        myCroppa: {},
        error: '',
        agent: '',
        process: '',
        companies: '',
        companyid: '',
        document: '',
        countries: '',
        locations: '',
        loading: true,
        students:{},
      }
    },
    created() {
      this.fetchAgent();
      this.fetchDocuments();
      this.fetchCountries();
      this.getStudents();
    },
    watch: {},
    computed: {
      cropimage() {
        if (this.agent.logo != null) {
          // this.myCroppa.refresh()
          return this.$root.baseUrl + '/public/images/agents/' + this.agent.logo
        } else {
          return " "
        }
      },
      filterStudents(){
        var self =this;
        if(self.students){
          var date = self.student_filter;
          var res = self.students.filter(s=>{
            var sd =self.format(s.created_at);
            s.created_at = sd;
            return s.created_at.includes(date);
          });
          console.log(res)
          return res;
        }

      },
    },
    methods: {
      format(date){
        return moment(String(date)).format('YYYY')
      },
      getStudents(){
        let vm = this;
        let self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/agent_information/students/'+id;
        axios.get(url)
        .then(function(response) {
          vm.students = response.data;
          vm.loading = false;
        })
        .catch(function(error) {
          console.log(error);
          vm.loading = false;
        });
      },
      deleter(id) {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/agent_document/' + id;
        axios.delete(url)
        .then(function(response) {
          self.hideEditDocumentModal();
          self.fetchAgent();
          self.fetchDocuments();
          self.fetchCountries();
          vm.loading = false;
        })
        .catch(function(error) {
          console.log(error);
          vm.loading = false;
        });
      },
      changeLocation(event) {
        var self = this;
        let index = (event.target.selectedOptions[0].index);
        index = index - 1;
        let loc = self.countries[index];
        if (loc) {
          self.locations = self.countries[index].locations;
        }
      },
      fetchCountries() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/countries';
        axios.get(url)
        .then(function(response) {
          vm.countries = response.data.data;
          vm.loading = false;
        })
        .catch(function(error) {
          console.log(error);
          vm.loading = false;
        });
      },
      addProcess() {
        var self = this;
        var form = self.$refs.addProcessForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_agreement_process';
        axios.post(url, formData).then(function(response) {
          self.fetchDocuments();
          $(form)[0].reset();
          self.hideAddProcessModal();
          self.$toastr.s("A agent agreement process has been added.");
        })
        .catch(function(error) {
          self.error = '';
          self.error = error.response.data.errors;
        });
      },
      editProcess() {
        var self = this;
        var form = self.$refs.editProcessForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_agreement_process/edit';
        axios.post(url, formData).then(function(response) {
          self.fetchDocuments();
          $(form)[0].reset();
          self.hideEditProcessModal();
          self.$toastr.s("A agent agreement process has been edited.");
        })
        .catch(function(error) {
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
      },
      editDocument() {
        this.myCroppa.refresh()
        var self = this;
        var form = self.$refs.editDocumentForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_document/edit';
        axios.post(url, formData).then(function(response) {
          self.fetchDocuments();
          $(form)[0].reset();
          self.hideEditDocumentModal();
          self.$toastr.s("A agent document has been edited.");
        })
        .catch(function(error) {
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
      },
      fetchDocuments() {
        var self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/agent_documents/';
        axios.get(url + id).then(function(response) {
          self.companies = response.data.data;
        })
        .catch(function(error) {
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
      },
      remove(event, id) {
        let type = event.currentTarget.attributes['type'].value;
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/' + type + '/';
        console.log(url);
        axios.delete(url + id).then(function(response) {
          vm.fetchCourse();
        })
        .catch(function(error) {
          console.log(error);
          vm.loading = false;
        });
      },
      fetchAgent() {
        let vm = this;
        let self = this;
        let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/agent_informations/';
        axios.get(url + id).then(function(response) {
          if (response.data == 'error') {
            self.$router.push('../agent_information');
          }
          vm.agent = response.data.data;
          vm.loading = false;
        })
        .catch(function(error) {
          console.log(error);
          vm.loading = false;
        });
      },
      editAgent() {
        var self = this;
        var form = self.$refs.editAgentForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_information/edit';
        formData.append('logo', self.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
          self.fetchDocuments();
          self.fetchAgent();
          $(form)[0].reset();
          self.hideEditAgentModal();
          self.$toastr.s("A agent has been edited.");
        })
        .catch(function(error) {
          self.error = '';
          self.error = error.response.data.errors;
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
      },
      addCompany() {
        var self = this;
        var form = self.$refs.addCompanyForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_document';
        axios.post(url, formData).then(function(response) {
          self.fetchAgent();
          self.fetchDocuments();
          $(form)[0].reset();
          self.hideAddCompanyModal();
          self.$toastr.s("A company has been added.");
        })
        .catch(function(error) {
          self.error = '';
          self.error = error.response.data.errors;
        });
      },
      showEditAgentModal() {
        this.$refs.editAgentModal.show();
      },
      hideEditAgentModal() {
        this.$refs.editAgentModal.hide();
      },
      showAddCompanyModal() {
        this.$refs.addCompanyModal.show();
      },
      hideAddCompanyModal() {
        this.$refs.addCompanyModal.hide();
      },
      showEditDocumentModal(docid) {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/agent_document/';
        axios.get(url + docid).then(function(response) {
          self.document = response.data.data;
          let country = (response.data.data.country);
          let url = self.$root.baseUrl + '/api/admin/branch_locations/getid/';
          axios.get(url + country).then(function(response) {
            country = response.data;
            let url = self.$root.baseUrl + '/api/admin/branch_locations/';
            axios.get(url + country).then(function(response) {
              self.locations = response.data.data.locations;
            })
          })
        })
        .catch(function(error) {
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
        this.$refs.editDocumentModal.show();
      },
      hideEditDocumentModal() {
        this.$refs.editDocumentModal.hide();
      },
      showAddProcessModal(id) {
        this.companyid = id;
        this.$refs.addProcessModal.show();
      },
      hideAddProcessModal() {
        this.companyid = '';
        this.$refs.addProcessModal.hide();
      },
      showEditProcessModal(id) {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/agent_agreement_processes/';
        axios.get(url + id).then(function(response) {
          self.process = response.data.data;
        })
        .catch(function(error) {
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
        this.$refs.editProcessModal.show();
      },
      hideEditProcessModal() {
        this.$refs.editProcessModal.hide();
      },
    },
  }
  </script>
