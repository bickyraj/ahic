<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Career Outcomes </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Career Outcome</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Course Outcome">
                <form @submit.prevent="addCareerOutcome" ref="addCourseOutcomeForm">
                  <div class="form-group">
                    <label for=""> Course </label>
                      <select name="course_id" class="form-control" required>
                          <option value="">Select A Course</option>
                          <option  v-for="course in courses" :value="course.id" :key="course.id">{{course.name}}</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" rows="5" required></textarea>
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Course Outcome</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>

                <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Course</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(menu, index) in table_items" :key="menu.id">
                <td>{{ menu.course.name}}</td>
                <!-- <td>{{menu}}</td> -->
                <td>{{ menu.description}}</td>
                <td>
                  <b-button size="sm" @click.stop="info(menu, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteMenu(menu, index, $event.target)" class="mr-1 btn-danger">
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
      <form @submit.prevent="editMenu" :row="modalInfo.row" ref="editMenuForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
         <div class="form-group">
           <label for=""> Course</label>
                      <select name="course_id"  v-bind:value="modalInfo.data.course_id" class="form-control">
                          <option value="">Select A Course</option>
                          <option  v-for="course in courses" :value="course.id" :key="course.id">{{course.name}}</option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" class="form-control" rows="5" :value="modalInfo.data.description"></textarea>
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
          courses:'',
        loading: true,
        table_items: [],
        pages:[],
        menu_table_fields: ['id', 'course_id','description'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchOutcomes();
      this.fetchCourses();
    },
    computed: {
    },
    methods: {
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/career_outcome/';
        axios.get(url + menu.id).then(function(response) {
            console.log(response.data.data);
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Career Outcome`
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
        this.modalInfo.title = 'Edit Menu'
        this.modalInfo.content = ''
      },
      editMenu: function() {
        var self = this;
        var form = self.$refs.editMenuForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/career_outcome/edit';
        axios.post(url, formData).then(function(response) {
          console.log(response);
            if (response.status === 200) {
           self.table_items = response.data.data
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Course Outcome updated successfully.',
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
            let url = self.$root.baseUrl + '/api/admin/career_outcome/';
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
      addCareerOutcome: function() {
        var self = this;
        var form = self.$refs.addCourseOutcomeForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/career_outcome';
        axios.post(url, formData).then(function(response) {
              self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A course outcome has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchOutcomes() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/career_outcomes';
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
      fetchCourses() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/courses';
        axios.get(url)
          .then(function(response) {
            vm.courses = response.data.data;
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