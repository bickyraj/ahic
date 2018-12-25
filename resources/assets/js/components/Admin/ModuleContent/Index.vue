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
                    <input type="text" name="title" class="form-control" placeholder="" >
                    <transition name="fade">
                    <p v-if="error.title" class="text-danger"> {{error.title[0]}}</p>
                    </transition>
                  </div>
                      <div class="form-group">
                    <label for="">Parent Menu</label>
                   <select  name="module_id" class="form-control">
                     <option value="" selected> Choose Parent Menu </option>
                    <option v-for="menu in modules" :value="menu.id" :key="menu.id"> {{menu.title}}</option>
                  </select>
            <transition name="fade">
                    <p v-if="error.module_id" class="text-danger"> {{error.module_id[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                   <editor  name="description" :init="editor"></editor>
                            <transition name="fade">
                    <p v-if="error.description" class="text-danger"> {{error.description[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
              <label for="">Order By</label>
              <input type="text" name="order_by" class="form-control" placeholder="" >
              <transition name="fade">
              <p v-if="error.order_by" class="text-danger"> {{error.order_by[0]}}</p>
              </transition>
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
                <th class="col-md-2"> Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(m, index) in table_items" :key="m.id">
                <td>{{ m.module.title}}</td>
                <td>{{ m.title.substring(0,25) + ".."}}</td>
                       <td v-if="m.image"> <img :src="'../public/images/module/'+m.image" class="img-fluid" /></td>
                       <td v-else> -- </td>
                <td >{{ m.description.substring(0,25) + ".."}}</td>
                <td>{{ m.status}}</td>
                <td>
                  <b-button size="sm" @click.stop="info(m, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteModule(m, index, $event.target)" class="mr-1 btn-danger">
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
                    <input type="text" name="title" v-model="modalInfo.data.title" class="form-control" placeholder="Enter A Title">
                  </div>
          <div class="form-group">
                    <label for="">Parent Menu</label>
                   <select v-model="modalInfo.data.module_id" name="module_id" class="form-control">
                     <option value="" selected> Choose Parent Menu </option>
            <option v-for="menu in modules" :value="menu.id" :key="menu.id"> {{menu.title}}</option>
          </select>
                  </div>

                  <div class="form-group">
                    <label for="">Description</label>
                   <editor name="description" v-model="modalInfo.data.description" :init="editor"></editor>
                  </div>
       <div class="form-group">
          <label for="">Status</label>
          <select name="status" id="" v-model="modalInfo.data.status" class="form-control">
            <option value="0"> Disable</option>
            <option value="1"> Enable</option>
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
        modules:'',
        loading: true,
        table_items: [],
        pages:[],
        module_table_fields: ['module_id', 'title','description','status'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
        error:'',
        editor:{
          plugins:['table','link','image code'],
          toolbar:['undo redo | link image |code'],
           setup: function (editor) {
        editor.on('change', function () {
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
      this.fetchModuleContents();
      this.fetchModules();
    },
    computed: {

    },
    methods: {
      info(m, index, button) {
         let self = this;
        let url = self.$root.baseUrl + '/api/admin/module_content/';
        axios.get(url + m.id).then(function(response) {
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
              $(form)[0].reset();
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
                }``
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
            self.error = '';
            self.error = error.response.data.errors;
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
        this.error=''
      },
      hideModuleModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
