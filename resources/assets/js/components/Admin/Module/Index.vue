<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Modules</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Module</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Module">
                <form @submit.prevent="addModule" ref="addModuleForm">
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="">
                    <transition name="fade">
                      <p v-if="error.title" class="text-danger"> {{error.title[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Display Type</label>
                    <select name="display_type" id="" class="form-control">
                      <option value="1">Plain</option>
                      <option value="2">Listing</option>
                    </select>
                    <transition name="fade">
                      <p v-if="error.display_type" class="text-danger"> {{error.display_type[0]}}</p>
                    </transition>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Module</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(module, index) in table_items" :key="module.id">
                <td> {{ module.title}} </td>
                <td>
                  <router-link :to="'module/'+module.id">
                    <b-button size="sm" class="mr-1 btn-primary">
                      View
                    </b-button>
                  </router-link>
                  <b-button size="sm" @click.stop="info(module, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteModule(module, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="4">
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
      <form @submit.prevent="editModule" :row="modalInfo.row" ref="editModuleForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" v-bind:value="modalInfo.data.title" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Display Type</label>
          <select name="display_type" :value="modalInfo.data.display_type" id="" class="form-control">
            <option value="1">Plain</option>
            <option value="2">Listing</option>
          </select>
        </div>
          <div class="form-group">
            <label for="">Status </label>
            <select name="status" :value="modalInfo.data.status" id="" class="form-control">
              <option value="0">Disable</option>
              <option value="1">Enable</option>
            </select>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModuleModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        error: '',
        loading: true,
        table_items: [],
        pages: [],
        module_table_fields: ['name', 'title', 'display_type', 'status'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchModules();
    },
    computed: {},
    methods: {
      info(module, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/module/';
        axios.get(url + module.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              console.log(response.data.data);
              self.modalInfo.title = `Edit Module`
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
        this.modalInfo.title = 'Edit Module'
        this.modalInfo.content = ''
      },
      editModule: function() {
        var self = this;
        var form = self.$refs.editModuleForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/module/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              self.table_items = response.data.data;
              self.hideModuleModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Module updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteModule: function(module, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/module/';
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
      addModule: function() {
        var self = this;
        var form = self.$refs.addModuleForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/module';
        axios.post(url, formData).then(function(response) {
            self.table_items = response.data.data;
            $(form)[0].reset();
            self.hideModal();
            self.$toastr.s("A module has been added.");
          })
          .catch(function(error) {
            self.error = '';
            self.error = error.response.data.errors;
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchModules() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/modules';
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
      hideModuleModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
