<template>
  <div class="animated">
    <b-row>
      <b-col cols="6">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Payment Options</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Payment Option</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Role">
                <form @submit.prevent="addRole" ref="addRoleForm">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Description</label>
                   <editor  name="description" :init="editor"></editor>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Payment Option</b-btn>
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
              <tr v-for="(role, index) in table_items" :key="role.id">
                <td>{{ role.title }}</td>
                <td>
                  <b-button size="sm" @click.stop="option = role" class="mr-1 btn-primary">
                    View
                  </b-button>
                  <b-button size="sm" @click.stop="info(role, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteRole(role, index, $event.target)" class="mr-1 btn-danger">
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
      <b-col cols="6" v-if="option != null">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> {{option.title}} </h5>
            </div>
            <div class="caption card-title-actions">

            </div>
          </div>
<div class="" v-html="option.description">

</div>
        </b-card>
        </b-col>
    </b-row>
    <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <!-- <pre>{{ modalInfo.data }}</pre> -->
      <form @submit.prevent="editRole" :row="modalInfo.row" ref="editRoleForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" v-bind:value="modalInfo.data.title" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Description</label>
                <editor  name="description" v-model="modalInfo.data.description" :init="editor"></editor>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideRoleModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        option:[],
        loading: true,
        table_items: [],
        role_table_fields: ['title', 'description'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
                editor:{
                  plugins:['table','link','image code'],
                  toolbar:['undo redo | link image |code'],
                  setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
                editor.on('load', function () {
                  console.log('loaded');
                    editor.save();
                });
      },
          image_title:true,
          automatic_uploads: true,
          file_picker_types: 'image',
          // and here's our custom image picker
          file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
                input.onchange = function() {
              var file = this.files[0];
              var reader = new FileReader();
              reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), { title: file.name });
              };
              reader.readAsDataURL(file);
            };
            input.click();
          }
        },

      }
    },
    created() {

      this.fetchRoles();

    },
    computed: {

    },
    methods: {
      info(item, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/payment_option/';
        axios.get(url + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.option = response.data.data
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Role`
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
        this.modalInfo.title = 'Edit Role'
        this.modalInfo.content = ''
      },
      editRole: function() {
        var self = this;
        var form = self.$refs.editRoleForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/payment_option/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              self.table_items = response.data.data;
              self.hideRoleModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Role updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      deleteRole: function(item, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/payment_option/';
            axios.delete(url + item.id).then(function(response) {
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
      addRole: function() {
        var self = this;
        var form = self.$refs.addRoleForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/payment_option';
        axios.post(url, formData).then(function(response) {
         self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A role has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchRoles() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/payment_options';
        axios.get(url)
          .then(function(response) {
            vm.table_items =  response.data.data;
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
      hideRoleModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
