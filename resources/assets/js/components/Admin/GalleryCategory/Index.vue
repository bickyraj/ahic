<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Gallery Categories</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Category</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Category">
                <form @submit.prevent="addGalleryCategory" ref="addGalleryCategoryForm">
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="" required>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Category</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(category, index) in table_items" :key="category.id">
                <td>{{ category.name }}</td>
                <td>
                  <b-button size="sm" @click.stop="info(category, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteGalleryCategory(category, index, $event.target)" class="mr-1 btn-danger">
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
      <!-- <pre>{{ modalInfo.data }}</pre> -->
      <form @submit.prevent="editGalleryCategory" :row="modalInfo.row" ref="editGalleryCategoryForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" v-bind:value="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideGalleryCategoryModal">Cancel</b-btn>
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
        category_table_fields: ['name', 'action'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchGalleryCategorys();
    },
    computed: {
      // edit_option_for_parent_category: function (categoryOptionId, parentId, categoryId) {
      //  console.log(categoryOptionId);
      // }
    },
    methods: {
      info(item, index, button) {
        let self = this;
        let url = this.$root.baseUrl + '/api/admin/gallery-category/'
        axios.get(url + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Category`
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
        this.modalInfo.title = 'Edit GalleryCategory'
        this.modalInfo.content = ''
      },
      editGalleryCategory: function() {
        var self = this;
        var form = self.$refs.editGalleryCategoryForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = this.$root.baseUrl + '/api/admin/edit-gallery-category'
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              var category = response.data.data;
              self.table_items[row_index].name = category.name;
              self.hideGalleryCategoryModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'GalleryCategory updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteGalleryCategory: function(item, row, event) {
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
            let url = this.$root.baseUrl + '/api/admin/gallery-category/'
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
      addGalleryCategory: function() {
        var self = this;
        var form = self.$refs.addGalleryCategoryForm;
        var formData = new FormData(form);
        let url = this.$root.baseUrl + '/api/admin/gallery-category'
        axios.post(url, formData).then(function(response) {
            if (response.status === 201) {
              var category = response.data.data;
              var category_data = {
                id: category.id,
                name: category.name,
              }
              self.table_items.push(category_data);
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A category has been added.");
            }
          })
          .catch(function(error) {});
      },
      fetchGalleryCategorys(category_url) {
        let vm = this;
        let url = this.$root.baseUrl + '/api/admin/gallery-categories'
        axios.get(url)
          .then(function(response) {
            var category_itmes = response.data.data;
            vm.table_items = category_itmes.map(obj => {
              var rObj = {};
              rObj['id'] = obj.id;
              rObj['name'] = obj.name;
              return rObj;
            })
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
      hideGalleryCategoryModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>