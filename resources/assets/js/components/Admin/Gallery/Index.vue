<style lang="">
  .vdp-datepicker__calendar{
        background-color: black !important;
        color:white;
    }
    .day__month_btn:hover ,.month__year_btn:hover{
        background-color: black !important;

    }
    .form-control:disabled, .form-control[readonly]{
        background-color: transparent !important;
    }
</style>
<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Gallery </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Image</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add New Images">
                <form @submit.prevent="addImages" ref="addImagesForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="parent news_event">Select Category</label>
                    <select class="form-control" name="gallery_category_id">
                      <option v-for="item in categories" :value="item.id" :key="item.id">{{ item.name }}</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Image </label>
                    <input type="file" name="image[]" class="form-control" multiple>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Images</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Image</th>
                <th>Category</th>
                <th>Action</th>
              </tr>
            </thead>
            <draggable v-model="table_items" :element="'tbody'" v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(images, index) in table_items" :key="images.id">
                <td>
                  <div style="width:200px;">
                    <img :src="'../public/images/gallery/'+images.image" class="img-fluid" alt="">
                  </div>
                </td>
                <td>
                  <select class="form-control" name="gallery_category_id" @change="changeCategory(images, index, $event.target)">
                    <option v-for="item in categories" :selected="item.id == images.gallery_category_id" :value="item.id" :key="item.id">{{ item.name }}</option>
                  </select>
                </td>
                <td>
                  <b-button size="sm" @click="deleteImages(images, index, $event.target)" class="mr-1 btn-danger">
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
  </div>
</template>
<script>
  export default {
    data() {
      return {
        loading: true,
        table_items: {
          gallery_category: []
        },
        categories: null,
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchImages();
      this.fetchCategories();
    },
    methods: {
      fetchCategories() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/gallery-categories';
        axios.get(url)
          .then(function(response) {
            vm.categories = response.data.data;
          })
          .catch(function(error) {
          });
      },
      fetchImages() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/gallery';
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
      addImages() {
        var self = this;
        var form = self.$refs.addImagesForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/gallery';
        axios.post(url, formData).then(function(response) {
            self.table_items = response.data.data;
            $(form)[0].reset();
            self.hideModal();
            self.$toastr.s("Image/s has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      resetModal() {
        this.modalInfo.title = 'Edit Images'
        this.modalInfo.content = ''
      },
      deleteImages: function(images, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/gallery/';
            axios.delete(url + images.id).then(function(response) {
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
      updateCourseOrder() {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/images/update-order';
        axios.post(url, self.table_items)
          .then(function(response) {
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
      hideImagesModal() {
        this.$refs.editModal.hide();
      },

      changeCategory(item, row, event) {
        var ps_value = event.value;
        var self = this;
        let url = this.$root.baseUrl + '/api/admin/gallery/' + item.id + '/change-category'
        axios.post(url, {gallery_category_id: ps_value}).then(function(response) {
            if (response.status == 200) {
              self.$toastr.s('Updated');
            }
        })
        .catch(function(error) {
        });
      },
    },
  }
</script>