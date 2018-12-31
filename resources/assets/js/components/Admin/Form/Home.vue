<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption w-100">
              <h5 class="col-md-12"><i class="fas fa-key"></i> Students <small class="float-right"> <router-link to="form"> <button class="btn btn-success">  Add Student</button> </router-link> </small> </h5>
            </div>
            <div class="caption card-title-actions">
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Created Date</th>
                <th>Country</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="applications.length > 0" v-show="!loading">
              <tr v-for="(menu) in applications" :key="menu.id">
                <td>  {{ menu.firstname}}  </td>
                <td>{{ menu.created_at}}</td>
                <td>{{ menu.birth_country}}</td>
                <td>
                <router-link :to="'student/'+menu.id">
                  <b-button size="sm"  class="mr-1 btn-primary">
                    View
                  </b-button>
                </router-link>
                  <b-button size="sm"  class="mr-1 btn-danger" @click="deleter(menu.id)">
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

  </div>
</template>
<script>
  export default {
    data() {
      return {
        loading: true,
        applications: [],
        pages:[],
        menu_table_fields: ['name', 'parent_id','page_id','parent_menu'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchAdmissions();
    },
    computed: {
    },
    methods: {
      fetchAdmissions() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/application_forms';
        axios.get(url)
          .then(function(response) {
            vm.applications = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },
      deleter(id){
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
            let url = self.$root.baseUrl + '/api/admin/application_form/';
            axios.delete(url + id).then(function(response) {
                if (response.status === 200) {
                  self.fetchAdmissions()
                  // self.table_items= response.data.data
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
      }
    },
  }
</script>
