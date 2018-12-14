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
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add New News">
                <form @submit.prevent="addNews" ref="addNewsForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Image  </label>
                    <input type="file" name="image[]" class="form-control" multiple>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create News</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>

                <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
           <draggable v-model="table_items" :element="'tbody'" v-if="table_items.length > 0" v-show="!loading" >

              <tr v-for="(news, index) in table_items" :key="news.id">
                <td> {{ news.image}}  </td>
                <td>
                  <!-- <router-link :to="'ga/'+news.id">
                  <b-button size="sm"  class="mr-1 btn-parimary">
                    View
                  </b-button>
                  </router-link>
              -->
                  <b-button size="sm" @click="deleteNews(news, index, $event.target)" class="mr-1 btn-danger">
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
    export default{
        data(){
            return{
        loading: true,
        table_items: [],
           modalInfo: {
          title: '',
          content: '',
          data: []
        },
            }
        },
        created(){
            this.fetchNews();
        },
        methods:{
            fetchNews(){
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
          addNews() {
        var self = this;
        var form = self.$refs.addNewsForm;
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
        this.modalInfo.title = 'Edit News'
        this.modalInfo.content = ''
      },

      deleteNews: function(news, row, event) {
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
            axios.delete(url + news.id).then(function(response) {
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
        let url = self.$root.baseUrl + '/api/admin/news/update-order';
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
      hideNewsModal() {
        this.$refs.editModal.hide();
      },
        },
    }
</script>