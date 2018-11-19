<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Page Modules</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Page Module</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Page Module">
                <form @submit.prevent="addPageModule" ref="addPageModuleForm">
                  <div class="form-group">
                    <label for=""> Page</label>
                   <select v-bind:value="modalInfo.data.parent_id" name="page_id" class="form-control">
                     <option value="" selected> Choose Parent Page </option>
                <option v-for="menu in pages" :value="menu.id" :key="menu.id"> {{menu.name}}</option>
              </select>
                  </div>
                  <div class="form-group">
                    <label for=""> Module</label>
                   <select v-bind:value="modalInfo.data.parent_id" name="module_id" class="form-control">
                     <option value="" selected> Choose Parent Module </option>
                <option v-for="menu in modules" :value="menu.id" :key="menu.id"> {{menu.name}}</option>
              </select>
                  </div>
                  
                  <div class="form-group">
                    <label for=""> Order By </label>
                    <input type="text" name="order_by" class="form-control" id="">
                  </div>

                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Page Module</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Page</th>
                <th>Module</th>
                <th>Order By</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(menu, index) in table_items" :key="menu.id">
                <td>{{ menu.page.name}}</td>
                <td>{{ menu.module.title}}</td>
                <td>{{ menu.order_by}}</td>
               
                <td>
                  <b-button size="sm" @click.stop="info(menu, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deletePageModule(menu, index, $event.target)" class="mr-1 btn-danger">
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
      <form @submit.prevent="editPageModule" :row="modalInfo.row" ref="editPageModuleForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
  
        <div class="form-group">
          <label for="">Module</label>
          <select v-bind:value="modalInfo.data.module_id" name="module_id" class="form-control">
                     <option value="" selected> Choose Module </option>
            <option v-for="module in modules" :value="module.id" :key="module.id"> {{module.title}}</option>
          </select>
        </div>


                        <div class="form-group">
          <label for="">Page</label>
                     <select v-bind:value="modalInfo.data.page_id" name="page_id" class="form-control">
                     <option value="" selected> Choose Page </option>
                    <option v-for="page in pages" :value="page.id" :key="page.id"> {{page.name}}</option>
                  </select>
                        </div>

                        <div class="form-group">
                    <label for=""> Order By </label>
                    <input type="text" name="order_by" :value="modalInfo.data.order_by"  class="form-control" id="">
                  </div>
       
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hidePageModuleModal">Cancel</b-btn>
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
        modules:[],
        menu_table_fields: ['name', 'module_id','page_id','order_by',],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchPageModules();
      this.fetchPages();
      this.fetchModules();
    },
    computed: {
    },
    methods: {
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/page_module/';
        axios.get(url + menu.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              console.log(response.data.data);
              self.modalInfo.title = `Edit Page Module`
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
        this.modalInfo.title = 'Edit PageModule'
        this.modalInfo.content = ''
      },
      editPageModule: function() {
        var self = this;
        var form = self.$refs.editPageModuleForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/page_module/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              self.table_items[row_index]['module_id'] = response.data.data.module_id;
              self.table_items[row_index]['page_id'] = response.data.data.page_id;
              self.table_items[row_index]['order_by'] = response.data.data.order_by;
              self.hidePageModuleModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Page Module updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deletePageModule: function(menu, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/page_module/';
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
      addPageModule: function() {
        var self = this;
        var form = self.$refs.addPageModuleForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/page_module';
        axios.post(url, formData).then(function(response) {
            if (response.status === 201) {
              var menu = response.data.data;
              var menu_data = {
                id: menu.id,
                module_id: menu.module_id,
                order_by: menu.order_by,
                page_id: menu.page_id,
              }
              self.table_items.push(menu_data);
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A page module has been added.");
            }
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchModules(){
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/modules';
      axios.get(url).then(function(response){
        vm.modules = response.data.data;
      })
      },
      fetchPages(){
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/pages';
      axios.get(url).then(function(response){
        vm.pages = response.data.data;
      })
      },
      fetchPageModules() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/page_modules';
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
      hidePageModuleModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>