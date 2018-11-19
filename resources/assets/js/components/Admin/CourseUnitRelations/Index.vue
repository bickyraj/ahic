<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Course Unit Relations </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Relation</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Relation">
                <form @submit.prevent="addRelation" ref="addRelationForm">
                  <div class="form-group">
                    <label for="">Course </label>
                    <select name="course_id" class="form-control">
                      <option v-for="course in courses" :value="course.id" :key="course.id">{{course.name}} </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Category </label>
                    <select name="course_unit_category_id" class="form-control">
                      <option v-for="category in categories" :value="category.id" :key="category.id">{{category.name}} </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Competence </label>
                    <select name="course_unit_competence_id" class="form-control">
                      <option v-for="competence in competences" :value="competence.id" :key="competence.id">{{competence.description}} </option>
                    </select>
                  </div>
              
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Relation</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>

                <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Course</th>
                <th>Unit Category</th>
                <th>Unit Competence</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(menu, index) in table_items" :key="menu.id">
                <td>{{ menu.course.name}}</td>
                <td>{{ menu.category.name}}</td>
                <td>{{ menu.competence.description}}</td>
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
                    <label for="">Course </label>
                    <select name="course_id" class="form-control"  :value="modalInfo.data.course_id">
                      <option v-for="course in courses" :value="course.id" :key="course.id">{{course.name}} </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Category </label>
                    <select name="course_unit_category_id" class="form-control" :value="modalInfo.data.course_unit_category_id">
                      <option v-for="category in categories" :value="category.id" :key="category.id">{{category.name}} </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Competence </label>
                    <select name="course_unit_competence_id" class="form-control" :value="modalInfo.data.course_unit_competence_id">
                      <option v-for="competence in competences" :value="competence.id" :key="competence.id">{{competence.description}} </option>
                    </select>
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
        competences:'',
        categories:'',
        loading: true,
        table_items: [],
        pages:[],
        menu_table_fields: ['id', 'course_id','category_id','competence_id'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchRelations();
      this.fetchCourses();
      this.fetchCompetences();
      this.fetchCategories();
    },
    computed: {
    },
    methods: {
      fetchCourses(){
           let self = this;
            let url = self.$root.baseUrl + '/api/admin/courses/';
        axios.get(url).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.courses = response.data.data
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      fetchCategories(){
           let self = this;
            let url = self.$root.baseUrl + '/api/admin/course_unit_categories/';
        axios.get(url).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.categories = response.data.data
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      fetchCompetences(){
           let self = this;
            let url = self.$root.baseUrl + '/api/admin/course_unit_competences/';
        axios.get(url).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.competences = response.data.data
            }
          })
          .catch(function(error) {
            self.$toastr.e('Something went wrong please try again.');
          });
      },
      info(menu, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_unit_relation/';
        axios.get(url + menu.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Course Unit Relation`
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
        let url = self.$root.baseUrl + '/api/admin/course_unit_relation/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
           self.table_items = response.data.data
              self.hideMenuModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Unit Relation updated successfully.',
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
            let url = self.$root.baseUrl + '/api/admin/course_unit_relation/';
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
      addRelation: function() {
        var self = this;
        var form = self.$refs.addRelationForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/course_unit_relation';
        axios.post(url, formData).then(function(response) {
                  self.table_items = response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A unit competence has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchRelations() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/course_unit_relations';
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
      hideMenuModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
