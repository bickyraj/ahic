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
              <h5><i class="fas fa-key"></i> Sliders </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Slider</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add New Slider">
                <form @submit.prevent="addSlider" ref="addSliderForm" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="">Title </label>
                    <input type="text" name="title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Sub Title </label>
                    <input type="text" name="sub_title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Image  </label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  <div class="form-group">
                        <label> Description </label>
                   <editor name="description"  :init="editor"></editor>
                  </div>

                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Slider</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>

                <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>Sub title</th>
                <th>Action</th>
              </tr>
            </thead>
           <draggable v-model="table_items" :element="'tbody'" v-if="table_items.length > 0" v-show="!loading" @update="updateSliderOrder">
              <tr v-for="(slider, index) in table_items" :key="slider.id">
                <td> {{ slider.title}}  </td>
                <td> {{ slider.sub_title}}  </td>
                <td>
                  <router-link :to="'slider/'+slider.id">
                  <b-button size="sm"  class="mr-1 btn-parimary">
                    View
                  </b-button>
                  </router-link>
                  <b-button size="sm" @click.stop="info(slider, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteSlider(slider, index, $event.target)" class="mr-1 btn-danger">
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
      <form @submit.prevent="editSlider" :row="modalInfo.row" ref="editSliderForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
                  <div class="form-group">
                    <label for="">Title </label>
                    <input type="text" name="title" :value="modalInfo.data.title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Sub Title </label>
                    <input type="text" name="sub_title" :value="modalInfo.data.sub_title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group" v-if="modalInfo.data.image == null">
                    <label for="">Image  </label>
                    <input type="file" name="image" class="form-control">
                  </div>
                  <div class="form-group" v-else>
                    <label for="">Image  </label> <br>
               <img :src="'../public/images/sliders/'+modalInfo.data.image" class="img-fluid" />
                    <input type="file" name="image" class="form-control">

                  </div>
                    <div class="form-group">
                        <label> Description </label>
                   <editor name="description"  :init="editor" :value="modalInfo.data.description"></editor>
                  </div>
                  <div class="form-group">
                    <label for="">Status </label>
                    <select name="status" :value="modalInfo.data.status" id="" class="form-control">
                      <option value="0">Disable</option>
                      <option value="1">Enable</option>
                    </select>
                  </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideSliderModal">Cancel</b-btn>
      </form>
    </b-modal>

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
        created(){
            this.fetchSlider();
        },
        methods:{
            fetchSlider(){
let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/sliders';
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
          addSlider() {
        var self = this;
        var form = self.$refs.addSliderForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/slider';
        axios.post(url, formData).then(function(response) {
              self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A slider has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
            resetModal() {
        this.modalInfo.title = 'Edit Slider'
        this.modalInfo.content = ''
      },
            info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/slider/';
        axios.get(url + menu.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Slider`
              self.modalInfo.data = response.data.data
              self.modalInfo.content = JSON.stringify(response.data.data, null, 2)
              self.$root.$emit('bv::show::modal', 'modalInfo', button)
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },

            editSlider: function() {
        var self = this;
        var form = self.$refs.editSliderForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/slider/edit';
        axios.post(url, formData).then(function(response) {
           self.table_items = response.data.data;
              self.hideSliderModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Slider updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
          })
          .catch(function(error) {});
      },





      deleteSlider: function(slider, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/slider/';
            axios.delete(url + slider.id).then(function(response) {
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








               updateSliderOrder() {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/slider/update-order';
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
      hideSliderModal() {
        this.$refs.editModal.hide();
      },
        },
    }
</script>
