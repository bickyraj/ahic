<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Agent Information </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add Agent</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Agent">
                <form @submit.prevent="addAgent" ref="addAgentForm">
                  <div class="form-group">
                    <label for="">ABN / Registration No / PAN </label>
                    <input type="text" name="pan" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Logo</label>
                    <input type="file" name="logo" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">First Name </label>
                    <input type="text" name="first_name" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Last Name </label>
                    <input type="text" name="last_name" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Telephone </label>
                    <input type="text" name="telephone" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Mobile Number </label>
                    <input type="text" name="mobile_no" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="text" name="start_date" class="form-control" placeholder="" required>
                  </div>
                  
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Agent</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>

          <div class="col-md-12">
            <div class="col-md-2 offset-md-7 float-left">
                <select name="" id="" class="form-control" v-model="shore">
                      <option value="on" > Onshore</option>
                      <option value="off"> Offshore</option>
                </select>
            </div>
            <div class="col-md-3 float-left">
               <input type="text" class="form-control" placeholder="Search">
            </div>
 
          </div>

                <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>Address</th>
                <th>Start Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(agent, index) in table_items" :key="agent.id">
                <td> <router-link :to="'agent/'+agent.id"> {{ agent.first_name}} {{agent.last_name}} </router-link>  </td>
                <td>{{ agent.mobile_no || '  --' }}</td>
                <td>{{ agent.email}}</td>
                <td>{{ agent.address.substring(0,30) + ".."}}</td>
                <td>{{ agent.start_date}}</td>
                <td>
                  <b-button size="sm" @click.stop="info(agent, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteMenu(agent, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="7">
                  <div v-if="!loading"> No Data.</div>
                  <div v-else> loading...</div>
                </td>
              </tr>
            </tbody>
          </table>

         
        </b-card>
      </b-col>
    </b-row>


     <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <form @submit.prevent="editMenu" :row="modalInfo.row" ref="editMenuForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
              <div class="form-group">
                    <label for="">ABN / Registration No / PAN </label>
                    <input type="text" name="pan" class="form-control" placeholder="" :value="modalInfo.data.pan" required>
                  </div>
                        <div class="form-group" v-if="modalInfo.data.logo == null"> 
                    <label for="">Logo </label>
                    <input type="file" name="logo" class="form-control">
                  </div>
                  <div class="form-group" v-else> 
                    <label for="">Logo </label> <br>
               <img :src="'../public/images/agents/'+modalInfo.data.logo" class="img-fluid" />
                    <input type="file" name="logo" class="form-control">

                  </div>

                  <div class="form-group">
                    <label for="">First Name </label>
                    <input type="text" name="first_name" class="form-control"  :value="modalInfo.data.first_name" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Last Name </label>
                    <input type="text" name="last_name" class="form-control" :value="modalInfo.data.last_name" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Telephone </label>
                    <input type="text" name="telephone" class="form-control" :value="modalInfo.data.telephone" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Mobile Number </label>
                    <input type="text" name="mobile_no" class="form-control" :value="modalInfo.data.mobile_no" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" :value="modalInfo.data.email" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control" :value="modalInfo.data.address" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Start Date</label>
                    <input type="text" name="start_date" class="form-control" :value="modalInfo.data.start_date" placeholder="" required>
                  </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideMenuModal">Cancel</b-btn>
      </form>
    </b-modal>

  </div>
</template>

<script>
  export default {
    data() {
      return {
        shore:"on",
          categories:'',
        loading: true,
        table_items: [],
        pages:[],
        menu_table_fields: ['id','PAN', 'first_name','last_name','telephone','mobile_no','email','address','start_date'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchAgents();
    },
    computed: {
    },
    methods: {
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/agent_information/';
        axios.get(url + menu.id).then(function(response) {
            console.log(response.data.data);
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Menu`
              self.modalInfo.data = response.data.data
              self.modalInfo.content = JSON.stringify(response.data.data, null, 2)
              self.$root.$emit('bv::show::modal', 'modalInfo', button)
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      resetModal() {
        this.modalInfo.title = 'Edit Agent Information'
        this.modalInfo.content = ''
      },
      editMenu: function() {
        var self = this;
        var form = self.$refs.editMenuForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_information/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
           self.table_items = response.data.data
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Course updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteMenu: function(menu, row, event) {
        var self = this;
        self.$swal({
          // position: 'top-end',
          type: 'info',
          title: 'Are you sure you want to delete this?',
          showConfirmButton: true,
          showCancelButton: true,
          // timer: 1500,
          customClass: 'crm-swal',
          confirmButtonText: 'Yes',
        }).then((result) => {
          if (result.value) {
            let url = self.$root.baseUrl + '/api/admin/agent_information/';
            axios.delete(url + menu.id).then(function(response) {
                if (response.status === 200) {
                  self.table_items.splice(row, 1);
                  self.$swal({
                    // position: 'top-end',
                    type: 'success',
                    title: 'Deleted',
                    showConfirmButton: true,
                    // timer: 1500,
                    customClass: 'crm-swal',
                    confirmButtonText: 'Ok',
                  }).then((result) => {
                    if (result.value) {}
                  })
                }
              })
              .catch(function(error) {});
          }
        })
      },
      addAgent: function() {
        var self = this;
        var form = self.$refs.addAgentForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/agent_information';
        axios.post(url, formData).then(function(response) {
              self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A agent has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchAgents() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/agent_informations';
        axios.get(url)
          .then(function(response) {
            vm.table_items = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },

  
      showModal() {
        this.$refs.myModalRef.show()
      },
      hideModal() {
        this.$refs.myModalRef.hide()
      },
      hideMenuModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>