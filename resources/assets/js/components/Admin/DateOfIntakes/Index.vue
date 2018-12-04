<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Date Of Intakes </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Date</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Intake">
                <form @submit.prevent="addIntake" ref="addIntakeForm">
                  <div class="form-group">
                    <label for="">Year</label>
                    <input type="text" name="year" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="text" name="date" class="form-control" placeholder="" required>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Date</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Year</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(module, index) in table_items" :key="module.id">
                <td>{{ module.year}}</td>
                <td>{{ module.date}}</td>
                <td>
                  <b-button size="sm" @click.stop="info(module, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteIntake(module, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="2">
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
      <form @submit.prevent="editIntake" :row="modalInfo.row" ref="editIntakeForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Year</label>
          <input type="text" name="year" v-bind:value="modalInfo.data.year" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Date</label>
          <input type="text" name="date" v-bind:value="modalInfo.data.date" class="form-control" placeholder="" required>
        </div>
       
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideIntakeModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        loading: true,
        table_items: [],
        pages:[],
        module_table_fields: ['name', 'title','display_type','status'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchIntakes();
    },
    computed: {
    },
    methods: {
      info(module, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intake/';
        axios.get(url + module.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              console.log(response.data.data);
              self.modalInfo.title = `Edit Intake`
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
        this.modalInfo.title = 'Edit Date Of Intake'
        this.modalInfo.content = ''
      },
      editIntake: function() {
        var self = this;
        var form = self.$refs.editIntakeForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/intake/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
            self.table_items = response.data.data;
              self.hideIntakeModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Intake updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteIntake: function(module, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/intake/';
            axios.delete(url + module.id).then(function(response) {
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
      addIntake: function() {
        var self = this;
        var form = self.$refs.addIntakeForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/intake';
        axios.post(url, formData).then(function(response) {
       self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A module has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },

      fetchIntakes() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/intakes';
        axios.get(url)
          .then(function(response) {
              console.log(response.data.data);
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
      hideIntakeModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>