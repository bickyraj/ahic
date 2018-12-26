<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i>
              {{category}} </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Course</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Course">
                <form @submit.prevent="addCourse" ref="addCourseForm">
                  <div class="form-group">
                    <label for="">Name </label>
                    <input type="text" name="name" class="form-control" placeholder="">
                    <transition name="fade">
                    <p v-if="error.name" class="text-danger"> {{error.name[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group d-none">
                    <label for=""> Course Category</label>
                      <select name="course_category_id" class="form-control" v-model="id">
                          <option value="">Select A Category</option>
                          <option v-for="category in categories" :value="category.id" :key="category.id">{{category.name}}</option>
                      </select>
                      <transition name="fade">
                      <p v-if="error.course_category_id" class="text-danger"> {{error.course_category_id[0]}}</p>
                      </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Background Image </label>
                    <croppa v-model="myCroppa" :width="360" :height="220" placeholder="Choose an image" :placeholder-font-size="0" :disabled="false" :quality="5" :show-remove-button="false" :prevent-white-space="true">
                    </croppa>
                    <transition name="fade">
                    <p v-if="error.background_image" class="text-danger"> {{error.background_image[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Video Link </label>
                    <input type="text" name="video_link" class="form-control" placeholder="" >
                    <transition name="fade">
                    <p v-if="error.video_link" class="text-danger"> {{error.video_link[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Duration </label>
                    <input type="text" name="duration" class="form-control" placeholder="" >
                    <transition name="fade">
                    <p v-if="error.duration" class="text-danger"> {{error.duration[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Study Method </label>
                    <input type="text" name="study_method" class="form-control" placeholder="" >
                    <transition name="fade">
                    <p v-if="error.study_method" class="text-danger"> {{error.study_method[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Onshore Fee </label>
                    <input type="text" name="onshore_fee" class="form-control" placeholder="" >
                    <transition name="fade">
                    <p v-if="error.onshore_fee" class="text-danger"> {{error.onshore_fee[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Offshore Fee </label>
                    <input type="text" name="offshore_fee" class="form-control" placeholder="" >
                    <transition name="fade">
                    <p v-if="error.offshore_fee" class="text-danger"> {{error.offshore_fee[0]}}</p>
                    </transition>
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
               <editor  name="description" :init="editor"></editor>
               <transition name="fade">
               <p v-if="error.description" class="text-danger"> {{error.description[0]}}</p>
               </transition>
                  </div>

                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Course</b-btn>
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
                <td>  {{ menu.name}}  </td>
                <td>
                  <router-link :to="menu.course_category_id+'/course/'+menu.id">
                  <b-button size="sm"  class="mr-1 btn-primary">
                    View
                  </b-button>
                </router-link>
                  <b-button size="sm" @click.stop="info(menu, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteCourse(menu, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
             </draggable>
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
      <form @submit.prevent="editCourse" :row="modalInfo.row" ref="editCourseForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
            <div class="form-group">
                    <label for="">Name </label>
                    <input type="text" name="name" class="form-control" ref="modalname" v-model="modalInfo.data.name" placeholder="" required>
                  </div>
            <div class="form-group">
                    <label for=""> Course Category</label>
                      <select name="course_category_id" class="form-control" v-model="modalInfo.data.course_category_id" >
                          <option value="">Select A Category</option>
                          <option  v-for="category in categories" :value="category.id" :key="category.id">{{category.name}}</option>
                      </select>
                  </div>
                  <div class="form-group" v-if="modalInfo.data.background_image == null">
                    <label for="">Image </label>
                    <croppa v-model="myCroppa" :width="360" :height="220" placeholder="Choose an image" :placeholder-font-size="0" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
                  </div>
                  <div class="form-group" v-else>
                    <label for="">Image </label> <br>
                    <croppa v-model="myCroppa" :initial-image="img" :width="360" :height="220" placeholder="Choose an image" :placeholder-font-size="0" :disabled="false" :quality="5" :show-remove-button="true" :prevent-white-space="true"></croppa>
                  </div>
                  <div class="form-group">
                    <label for="">Video Link </label>
                    <input type="text" name="video_link" class="form-control"  v-model="modalInfo.data.video_link" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Duration </label>
                    <input type="text" name="duration" class="form-control"  v-model="modalInfo.data.duration" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Study Method </label>
                    <input type="text" name="study_method" class="form-control"  v-model="modalInfo.data.study_method" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Onshore Fee  </label>
                    <input type="text" name="onshore_fee" class="form-control"  v-model="modalInfo.data.onshore_fee" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Offshore Fee </label>
                    <input type="text" name="offshore_fee" class="form-control"  v-model="modalInfo.data.offshore_fee" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                   <editor  name="description" v-model="modalInfo.data.description" :init="editor"></editor>
                  </div>

                      <!-- <div class="form-group">
          <label for="">Status</label>
          <select name="status" id="" v-model="modalInfo.data.status" class="form-control">
            <option value="0"> Disable</option>
            <option value="1"> Enable</option>
          </select>
        </div> -->
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
        myCroppa: null,
          categories:'',
          category:'',
        loading: true,
        table_items: [],
        pages:[],
        menu_table_fields: ['id','name','course_category_id','description','onshore_fee','offshore_fee','video_link','duration','study_method','order_by','status'],
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
    created() {
      this.fetchCourses();
      this.categoryName();
      this.fetchCategories();
    },
    computed: {
      id(){
        return  parseInt(this.$route.params.id);
      },

      img() {
        if (this.modalInfo.data.background_image != null) {
          this.myCroppa.refresh()
          return '../public/images/courses/' + this.modalInfo.data.background_image
        }
      }

    },
    methods: {
      categoryName(){
        let self = this;
        var c;
        let cid =   parseInt(this.$route.params.id);
        let url = this.$root.baseUrl + '/api/admin/course_category/get/'+cid;
        axios.get(url).then(function(response) {
           self.category =  response.data.data.name
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });

    },
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course/';
        axios.get(url + menu.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Course`
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
        this.modalInfo.title = 'Edit Course'
        this.modalInfo.content = ''
      },
      editCourse: function() {
        var self = this;
        var form = self.$refs.editCourseForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        formData.append('background_image', this.myCroppa.generateDataUrl())
                    let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/course/edit/'+id;
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
           self.table_items = response.data.data;
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Course updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      deleteCourse: function(menu, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/course/';
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
      addCourse: function() {
        var self = this;
        var form = self.$refs.addCourseForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course';
        formData.append('background_image', this.myCroppa.generateDataUrl())
        axios.post(url, formData).then(function(response) {
              var menu = response.data.data;
              var menu_data = {
                id: menu.id,
                name: menu.name,
                background_image: menu.background_image,
                video_link: menu.video_link,
                duration: menu.duration,
                order_by: menu.order_by,
                status: menu.status,
                description: menu.description,
                study_method: menu.study_method,
              }
              self.table_items.push(menu_data);
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A course has been added.");
          })
          .catch(function(error) {
            self.error = '';
            self.error = error.response.data.errors;
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchCourses() {
        let vm = this;
        let self = this;
                    let id = parseInt(this.$route.params.id);
        let url = self.$root.baseUrl + '/api/admin/courses/';
        axios.get(url+id+'/showByCategory')
          .then(function(response) {
            vm.table_items = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },
      fetchCategories() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_categories';
        axios.get(url)
          .then(function(response) {
            vm.categories = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },
     updateCourseOrder() {
        var self = this;
        let url = self.$root.baseUrl + '/api/admin/course/update-order';
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
