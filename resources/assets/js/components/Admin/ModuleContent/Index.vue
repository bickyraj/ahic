<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Module Contents</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Module Content</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Module Content">
                <form @submit.prevent="addModule" ref="addModuleForm">
                        <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="" required>
                  </div>
                      <div class="form-group">
                    <label for="">Parent Menu</label>
                   <select  name="module_id" class="form-control">
                     <option value="" selected> Choose Parent Menu </option>
            <option v-for="menu in modules" :value="menu.id" :key="menu.id"> {{menu.title}}</option>
          </select>
                  </div>
                  <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                      <textarea name="description" id="" class="form-control"  rows="6"></textarea>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Module Content</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Module </th>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(module, index) in table_items" :key="module.id">
                <td>{{ module.module_id}}</td>
                <td>{{ module.title}}</td>
                <td>{{ module.image}}</td>
                <td>{{ module.description}}</td>
                <td>{{ module.status}}</td>
                <td>
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
                <td colspan="6">
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
                    <input type="text" name="title" :value="modalInfo.data.title" class="form-control" placeholder="" required>
                  </div>
          <div class="form-group">
                    <label for="">Parent Menu</label>
                   <select v-bind:value="modalInfo.data.module_id" name="module_id" class="form-control">
                     <option value="" selected> Choose Parent Menu </option>
            <option v-for="menu in modules" :value="menu.id" :key="menu.id"> {{menu.title}}</option>
          </select>
                  </div>
<div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" class="form-control" placeholder="" >
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                      <textarea name="description" id="" class="form-control"  rows="6" :value="modalInfo.data.description"></textarea>
                  </div> 
        <div class="form-group">
          <label for="">Status</label>
          <input type="text" name="status" v-bind:value="modalInfo.data.status" class="form-control" placeholder="" required>
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
        modules:'',
        loading: true,
        table_items: [],
        pages:[],
        module_table_fields: ['module_id', 'title','description','image','status'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchModuleContents();
      this.fetchModules();
    },
    computed: {
    },
    methods: {
      info(module, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/module_content/';
        axios.get(url + module.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Module Content`
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
        let url = self.$root.baseUrl + '/api/admin/module_content/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
            self.table_items = response.data.data;
              self.hideModuleModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Module content updated successfully.',
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
            let url = self.$root.baseUrl + '/api/admin/module_content/';
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
        let url = self.$root.baseUrl + '/api/admin/module_content';
        axios.post(url, formData).then(function(response) {
       self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A module content has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },

      fetchModuleContents() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/module_contents';
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
      fetchModules() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/modules';
        axios.get(url)
          .then(function(response) {
            vm.modules = response.data.data;
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