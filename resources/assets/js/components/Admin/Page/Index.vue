<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Pages</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Page</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add page">
                <form @submit.prevent="addMenu" ref="addMenuForm">
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="name" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for=""> Page Banner </label>
                    <div>
                      <croppa v-model="myCroppa" :width="384" :height="54" placeholder="click to choose image" :placeholder-font-size="14" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true">
                      </croppa>
                    </div>
                    <!-- <button @click="croppa.chooseFile()">CHOOSE FILE...</button> -->
                    <!-- <input type="file" name="image" class="form-control" placeholder="" > -->
                  </div>
                  <div class="form-group">
                    <label for="">Parent Page</label>
                    <select v-bind:value="modalInfo.data.parent_id" name="parent_id" class="form-control">
                      <option selected value=""> No Parent Selected</option>
                      <option v-for="page in table_items" :value="page.id" :key="page.id"> {{page.name}}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Sub Title</label>
                    <input type="text" name="sub_title" class="form-control" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <editor id="description" v-model="getAddPageContent" name="description"></editor>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create page</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th> Name </th>
                <th>Parent Page</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(page, index) in table_items" :key="page.id">
                <td> {{ page.name}} </td>
                <td v-if="page.parent_page">{{page.parent_page.name}} </td>
                <td v-else> -- </td>
                <td>
                  <router-link :to="'page/'+page.id">
                    <b-button size="sm" class="mr-1 btn-primary">
                      View
                    </b-button>
                  </router-link>
                  <b-button size="sm" @click.stop="info(page, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteMenu(page, index, $event.target)" class="mr-1 btn-danger">
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
      <form @submit.prevent="editMenu" :row="modalInfo.row" ref="editMenuForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" v-bind:value="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <div class="form-group" v-if="modalInfo.data.image == null">
          <label for="">Image </label>
          <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group" v-else>
          <label for="">Image </label> <br>
          <!-- <img :src="'../public/images/pages/'+modalInfo.data.image" class="img-fluid" /> -->
          <div>
            <croppa v-model="myCroppa" :initial-image="img" :width="384" :height="54" placeholder="click to choose image" :placeholder-font-size="14" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
          </div>
        </div>
        <div class="form-group">
          <label for="">Parent page</label>
          <select v-bind:value="modalInfo.data.parent_id" name="parent_id" class="form-control">
            <option value="" selected> Choose Parent</option>
            <option v-for="page in table_items" :value="page.id" :key="page.id" v-if="modalInfo.data.id != page.id"> {{page.name}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="">Sub Title</label>
          <input type="text" name="sub_title" v-bind:value="modalInfo.data.sub_title" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Description</label>
          <editor name="description" id="editPageTextEditor" ref="editPageTextEditor" v-model="getEditPageContent"></editor>
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
        getAddPageContent: "",
        getEditPageContent: "",
        myCroppa: null,
        dataUrl: '',
        loading: true,
        table_items: [],
        menu_table_fields: ['name', 'parent_id', 'sub_title', 'image', 'description', 'parent_menu'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchMenus();
    },
    computed: {
      img() {
        if (this.modalInfo.data.image != null) {
          this.myCroppa.refresh()
          return '../public/images/pages/' + this.modalInfo.data.image
        }
      }
    },
    methods: {
      info(page, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/page/';
        axios.get(url + page.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit page`
              self.modalInfo.data = response.data.data
              self.modalInfo.content = JSON.stringify(response.data.data, null, 2)
              self.getEditPageContent = response.data.data.description
              if (response.data.data.description == null) {
                self.getEditPageContent = "";
              } 
              self.$root.$emit('bv::show::modal', 'modalInfo', button)
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      resetModal() {
        this.modalInfo.title = 'Edit Page'
        this.modalInfo.content = ''
      },
      editMenu: function() {
        var self = this;
        var form = self.$refs.editMenuForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        var content = tinymce.get('editPageTextEditor').getContent();
        formData.append('description', content);
        let url = self.$root.baseUrl + '/api/admin/edit-page';
        formData.append('image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
            console.log(response);
            if (response.status === 200) {
              self.table_items = response.data.data;
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Page updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteMenu: function(page, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/page/';
            axios.delete(url + page.id).then(function(response) {
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
      addMenu: function() {
        var self = this;
        var form = self.$refs.addMenuForm;
        var formData = new FormData(form);
        var des = this.getAddPageContent;
        formData.append('description', des);

        let url = self.$root.baseUrl + '/api/admin/page';
        formData.append('image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
          self.table_items = response.data.data;
          $(form)[0].reset();
          self.hideModal();
          self.$toastr.s("A Page has been added.");
        })
        .catch(function(error) {
          if (error.response.status === 422) {
            self.$toastr.e(error.response.data.errors.name);
          }
        });
      },
      fetchMenus() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/pages';
        axios.get(url)
          .then(function(response) {
            var menu_items = response.data.data;
            vm.table_items = menu_items.map(obj => {
              var rObj = {};
              rObj['id'] = obj.id;
              rObj['name'] = obj.name;
              rObj['parent_id'] = obj.parent_id;
              rObj['sub_title'] = obj.sub_title;
              rObj['description'] = obj.description;
              rObj['parent_page'] = obj.parent_page;
              rObj['image'] = obj.image;
              return rObj;
            });
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
