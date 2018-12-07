<style lang="" scoped>

.no-m-p {
  padding: 0px !important;
  margin: 0px !important;
}

.caption {
  width: 100%;
}

</style>

<template>

  <div class="animated">
    <b-row>
      <b-col>
        <h1 v-if="loading"> LOADING..</h1>

        <div v-else>
          <div class="col-md-12">
          </div>
          <div class="col-md-6 float-left">
            <b-card class="col-md-12 mb-2 trump-card ">
              <div class="col-md-12">
                    <div class="card-title">
                  <div class="caption">
                    <h5><i class="fas fa-key"></i>  Agent Detail <small class="float-right"> <button class="btn btn-success" @click="showEditAgentModal"> Edit </button> </small></h5>
                  </div>

                </div>

                  <table class="table table-borderless">
                      <tr>
                          <th class="col-md-1"> Name <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{agent.first_name}} {{agent.last_name}} </td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Address <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{agent.address}}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Telephone <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{agent.telephone || '--' }}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Mobile No <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{agent.mobile_no || '--'  }}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Email <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{agent.email}}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Start Date <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{agent.start_date}}</td>
                      </tr>
                  </table>
                <p class="pt-3" v-html="agent.description"></p>

              </div>

            </b-card>

          </div>

          <div class="col-md-6 float-left admin-right">
            <b-card class="col-md-12 trump-card ">
              <div class="col-md-12">
                <div class="card-title">
                  <div class="caption">
                    <h5><i class="fas fa-key"></i> Student Report<small class="float-right"> <select name="" id="" class="form-control"> <option selected> Year </option></select> </small></h5>
                  </div>

                </div>
                <b-collapse id="collapse1">
                  <div class="col-md-12">

                  </div>
                </b-collapse>
              </div>
            </b-card>
                </div>

              </div>
            </b-col>
          </b-row>

    <b-row>
      <b-col>
                        <div class="col-md-12">
          <h4 class="p-4 caption"> Company Details<small class="float-right"> <button class="btn btn-success" @click="showAddCompanyModal"> Add A Company </button> </small></h4>
                    </div>

          <div class="col-md-12" v-for="company in companies" :key="company.id">
            <b-card class="col-md-12 mb-2 trump-card ">
              <div class="col-md-12">

                  <table class="table table-borderless col-md-10">
                      <tr>
                          <th class="col-md-1"> Company Name <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.company_name}} </td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Address <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.location}}</td>
                      </tr>
                  </table>
                  <hr>

           <div class="row">
               <div class="col-md-6 float-left">
                   <b-card class="col-md-12 mb-2 trump-card ">
              <div class="col-md-12">
                    <div class="card-title">
                  <div class="caption">
                    <h5><i class="fas fa-key"></i> Agent Document <small class="float-right"> <button class="btn btn-success" @click="showEditDocumentModal(company.id)"> Edit</button> </small> </h5>
                  </div>

                </div>

                  <table class="table table-borderless">
                      <tr>
                          <th class="col-md-1"> EOI <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.EOI}} </td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> ABN <span class="float-right">:</span> </th>
                          <td class="col-md-8"> {{company.ABN}}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Reference <span class="float-right">:</span> </th>
                          <td class="col-md-8"> {{company.reference}}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Qualification <span class="float-right">:</span> </th>
                          <td class="col-md-8"> {{company.qualification}}</td>
                      </tr>
                      <tr>
                          <th class="col-md-2"> Profile <span class="float-right">:</span> </th>
                          <td class="col-md-8"> {{company.profile}}</td>
                      </tr>
                  </table>
                <p class="pt-3" v-html="agent.description"></p>

              </div>

            </b-card>
               </div>
               <div class="col-md-6 float-left">
                   <b-card class="col-md-12 mb-2 trump-card ">
              <div class="col-md-12">
                    <div class="card-title">
                  <div class="caption">
                    <h5><i class="fas fa-key"></i>  Agreement Process<small class="float-right">
                        <button class="btn btn-success" @click="showEditProcessModal(company.process.id)" v-if="company.process"> Edit</button>
                         <button class="btn btn-success" @click="showAddProcessModal(company.id)" v-else> Add</button> </small> </h5>
                  </div>

                </div>
<div v-if="company.process">

                  <table class="table table-borderless">
                      <tr>
                          <th class="col-md-6"> Sent Date <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.process.sent_date}}  </td>
                      </tr>
                      <tr>
                          <th class="col-md-6"> Agreement <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.process.agreement}}  </td>
                      </tr>
                      <tr>
                          <th class="col-md-6"> Recieve Date <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.process.received_date}}  </td>
                      </tr>
                      <tr>
                          <th class="col-md-6"> Signed <span class="float-right">:</span> </th>
                          <td class="col-md-8">  {{company.process.signed}}  </td>
                      </tr>
                  </table>
</div>
                <p class="pt-3" v-html="agent.description"></p>

              </div>

            </b-card>

               </div>
           </div>

              </div>

            </b-card>

          </div>

            </b-col>
          </b-row>



                 <b-modal class="ess-modal" ref="editAgentModal" hide-footer title="Edit Agent">
            <form @submit.prevent="editAgent" ref="editAgentForm">
              <input type="hidden" name="id" :value="agent.id">
              <div class="form-group">
                <label for=""> PAN</label>
                <input type="text" name="pan" class="form-control" :value="agent.pan">
              </div>
              <div class="form-group">
                <label for=""> First Name </label>
                <input type="text" name="first_name" class="form-control" :value="agent.first_name">
              </div>
              <div class="form-group">
                <label for=""> Last Name </label>
                <input type="text" name="last_name" class="form-control" :value="agent.last_name">
              </div>
              <div class="form-group">
                <label for=""> Telephone </label>
                <input type="text" name="telephone" class="form-control" :value="agent.telephone">
              </div>
              <div class="form-group">
                <label for=""> Mobile Number </label>
                <input type="text" name="mobile_no" class="form-control" :value="agent.mobile_no">
              </div>
              <div class="form-group">
                <label for=""> Email </label>
                <input type="text" name="email" class="form-control" :value="agent.email">
              </div>
              <div class="form-group">
                <label for=""> Address </label>
                <input type="text" name="address" class="form-control" :value="agent.address">
              </div>
              <div class="form-group">
                <label for=""> Start Date </label>
                <input type="text" name="start_date" class="form-control" :value="agent.start_date">
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
                <input type="text" name="company_name" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> EOI </label>
                <input type="file" name="EOI" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> ABN</label>
                <input type="file" name="ABN" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Reference </label>
                <input type="file" name="reference" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Qualification </label>
                <input type="file" name="qualification" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Profile </label>
                <input type="file" name="profile" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Address </label>
                <input type="text" name="address" class="form-control" >
              </div>

              <div class="form-group">
                <label for=""> Country </label>
                <select name="country" id="" class="form-control" @change="changeLocation">
                  <option value=""> Choose A Country</option>
                  <option v-for="(country,index) in countries" :value="country.name" :key="country.id" :index="index"> {{country.name}} </option>
                </select>
              </div>

               <div class="form-group">
                <label for=""> Location </label>
                  <select name="location" id="" class="form-control" >
                  <option value=""> Choose A Location</option>
                  <option v-for="country in locations" :value="country.location" :key="country.id" > {{country.location}} </option>
                </select>
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
                <input type="text" name="company_name" class="form-control" :value="document.company_name" >
              </div>
              <div class="form-group">
                <label for=""> Address</label>
                <input type="text" name="address" class="form-control" :value="document.address" >
              </div>
         <div class="form-group">
                <label for=""> Country </label>
                <select name="country" id="" class="form-control" @change="changeLocation" :value="document.country">
                  <option value=""> Choose A Country</option>
                  <option v-for="(country,index) in countries" :value="country.name" :key="country.name" :index="index"> {{country.name}} </option>
                </select>
              </div>

               <div class="form-group">
                <label for=""> Location </label>
                  <select name="location" id="" class="form-control" :value="document.location">
                  <option value=""> Choose A Location</option>
                  <option v-for="country in locations" :value="country.location" :key="country.id" > {{country.location}} </option>
                </select>
              </div>
              <div class="form-group">
                <label for=""> EOI </label>
                <input type="file" name="EOI" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> ABN</label>
                <input type="file" name="ABN" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Reference </label>
                <input type="file" name="reference" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Qualification </label>
                <input type="file" name="qualification" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Profile </label>
                <input type="file" name="profile" class="form-control" >
              </div>

              <b-btn class="mt-3 pull-right" variant="danger" @click="hideEditDocumentModal">Delete</b-btn>
              <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="primary" type="submit">Edit Document</b-btn>
              <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEditDocumentModal">Cancel</b-btn>
            </form>
          </b-modal>

                 <b-modal class="ess-modal" ref="addProcessModal" hide-footer title="Add Agreement Process">
            <form @submit.prevent="addProcess" ref="addProcessForm">
              <input type="" name="agent_id" :value="agent.id">
              <input type="" name="agent_document_id" :value="companyid">
              <div class="form-group">
                <label for=""> Sent Date</label>
                <input type="text" name="sent_date" class="form-control">
              </div>
                  <div class="form-group">
                <label for=""> Agreement </label>
                <input type="file" name="agreement" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Recieved Date </label>
                <input type="text" name="received_date" class="form-control">
              </div>
              <div class="form-group">
                <label for=""> Signed </label>
                <input type="text" name="signed" class="form-control" >
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
                <input type="text" name="sent_date" class="form-control" :value="process.sent_date" >
              </div>
                  <div class="form-group">
                <label for=""> Agreement </label>
                <input type="file" name="agreement" class="form-control" >
              </div>
              <div class="form-group">
                <label for=""> Recieved Date </label>
                <input type="text" name="received_date" class="form-control" :value="process.received_date">
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

      </template>

      <script>

      export default {
        data() {
          return {
           agent:'',
           process:'',
           companies:'',
           companyid:'',
           document:'',
           countries:'',
           locations:'',
            loading: true,
          }
        },
        created() {
          this.fetchAgent();
          this.fetchDocuments();
          this.fetchCountries();
        },
        computed: {},
        methods: {
          changeLocation(event){
            var self =this;
            let index = (event.target.selectedOptions[0].index);
            index = index-1;
            let loc = self.countries[index];
            if(loc){
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

          addProcess(){
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
              if (error.response.status === 422) {
                self.$toastr.e(error.response.data.errors.name);
              }
            });
          },
            editProcess(){
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
            editDocument(){
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
            fetchDocuments(){
          var self = this;
            let id = parseInt(this.$route.params.id);
            let url = self.$root.baseUrl + '/api/admin/agent_documents/';
            axios.get(url +id).then(function(response) {
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
                if(response.data =='error'){
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
          editAgent(){
            var self = this;
            var form = self.$refs.editAgentForm;
            var formData = new FormData(form);
            let url = self.$root.baseUrl + '/api/admin/agent_information/edit';
            axios.post(url, formData).then(function(response) {
              self.fetchDocuments();
              $(form)[0].reset();
              self.hideEditAgentModal();
              self.$toastr.s("A agent has been edited.");
            })
            .catch(function(error) {
              if (error.response.status === 422) {
                self.$toastr.e(error.response.data.errors.name);
              }
            });
          },
          addCompany(){
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
              if (error.response.status === 422) {
                self.$toastr.e(error.response.data.errors.name);
              }
            });
          },
            showEditAgentModal(){
                this.$refs.editAgentModal.show();
        },
        hideEditAgentModal(){
                this.$refs.editAgentModal.hide();
        },
            showAddCompanyModal(){
                this.$refs.addCompanyModal.show();
        },
        hideAddCompanyModal(){
                this.$refs.addCompanyModal.hide();
        },
            showEditDocumentModal(docid){
                var self = this;
            let url = self.$root.baseUrl + '/api/admin/agent_document/';
            axios.get(url +docid).then(function(response) {
                self.document = response.data.data;
                let country = (response.data.data.country);
                    let url = self.$root.baseUrl + '/api/admin/branch_locations/';
            axios.get(url + country).then(function(response) {
              console.log(response.data.data);
                self.locations = response.data.data.locations;
            })

            })
            .catch(function(error) {
              if (error.response.status === 422) {
                self.$toastr.e(error.response.data.errors.name);
              }
            });

                this.$refs.editDocumentModal.show();
        },
        hideEditDocumentModal(){
                this.$refs.editDocumentModal.hide();
        },
              showAddProcessModal(id){
            this.companyid = id;
                this.$refs.addProcessModal.show();
        },
        hideAddProcessModal(){
                this.companyid ='';
                this.$refs.addProcessModal.hide();
        },
      showEditProcessModal(id){
              var self = this;
            let url = self.$root.baseUrl + '/api/admin/agent_agreement_processes/';
            axios.get(url +id).then(function(response) {
                self.process = response.data.data;
            })
            .catch(function(error) {
              if (error.response.status === 422) {
                self.$toastr.e(error.response.data.errors.name);
              }
            });

                this.$refs.editProcessModal.show();
        },
        hideEditProcessModal(){
                this.$refs.editProcessModal.hide();
        },

        },

      }

      </script>
