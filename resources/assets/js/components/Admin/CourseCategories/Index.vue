<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Course Category </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Course Category</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Course Category">
                <form @submit.prevent="addCategory" ref="addCategoryForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Name </label>
                    <input type="text" name="name" class="form-control" placeholder="">
                    <transition name="fade">
                    <p v-if="error.name" class="text-danger"> {{error.name[0]}}</p>
                    </transition>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Course Category</b-btn>
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
           <draggable v-model="table_items" :element="'tbody'" v-if="table_items.length > 0" v-show="!loading" @update="updateCourseOrder">

              <tr v-for="(menu, index) in table_items" :key="menu.id">
                <td> {{ menu.name}}  </td>
                <td>
                  <router-link :to="'course_category/'+menu.id">
                  <b-button size="sm"  class="mr-1 btn-parimary">
                    View
                  </b-button>
                  </router-link>
                  <b-button size="sm" @click.stop="info(menu, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteMenu(menu, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
   </draggable>
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
                    <label for="">Name </label>
                    <input type="text" name="name" :value="modalInfo.data.name" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group" v-if="modalInfo.data.image_background == null">
                    <label for="">Image Background </label>
                    <input type="file" name="image_background" class="form-control">
                  </div>
                  <div class="form-group" v-else>
                    <label for="">Image Background </label> <br>
               <img :src="'../public/images/course_category/'+modalInfo.data.image_background" class="img-fluid" />
                    <input type="file" name="image_background" class="form-control">

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
        error:'',
          categories:'',
        loading: true,
        table_items: [],
        pages:[],
        menu_table_fields: ['id', 'name','image_background','order_by','status'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchCategories();
    },
    computed: {
    },
    methods: {
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_category/';
        axios.get(url + menu.id).then(function(response) {
            console.log(response.data.data);
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Course Category`
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
        this.modalInfo.title = 'Edit Course Category'
        this.modalInfo.content = ''
      },
      editMenu: function() {
        var self = this;
        var form = self.$refs.editMenuForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_category/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
           self.table_items = response.data.data
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Unit Course Category updated successfully.',
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
            let url = self.$root.baseUrl + '/api/admin/course_category/';
            axios.delete(url + menu.id).then(function(response) {
              console.log(response);
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
      addCategory: function() {
        var self = this;
        var form = self.$refs.addCategoryForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_category';
        axios.post(url, formData).then(function(response) {
              var menu = response.data.data;
              var menu_data = {
                id: menu.id,
                name: menu.name,
                image_background: menu.image_background,
                order_by: menu.order_by,
                status: menu.status,
              }
              self.table_items.push(menu_data);
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A course category has been added.");
          })
          .catch(function(error) {
            self.error = '';
            self.error = error.response.data.errors;
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchCategories() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_categories';
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
    updateCourseOrder() {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/course_category/update-order';
      	axios.post(url, self.table_items)
		.then(function (response) {
			if (response.data.status === 1) {
				self.$toastr.s("Order Updated");
			}
    })
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
