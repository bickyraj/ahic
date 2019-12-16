<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption col-md-6">
              <div class="row">
                <h5><i class="fas fa-key"></i> Students</h5>
              </div>
              <!-- <h5 class="col-md-12"><i class="fas fa-key"></i> Students </h5> -->
            </div>
            <div class="caption card-title-actions col-md-6 float-right">
              <div class="float-right">
                <small class="float-right"> <router-link to="form"> <button class="btn btn-success">  Add Student</button> </router-link> </small>
              </div>
              <div class="col-md-4 float-right">
                <select class="form-control" name="" v-model="filterBy" >
                  <option value="0">All</option>
                  <option value="1">Pending</option>
                  <option value="2">On Process</option>
                  <option value="3">Applied</option>
                </select>
              </div>

            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Created Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="filterData.length > 0" v-show="!loading">
              <tr v-for="(menu,index) in filterData" :key="menu.id">
                <td>  {{ menu.firstname}}  </td>
                <td>{{ format(menu.created_at)}}</td>
                <td>
                  <select class="form-control" name="" v-model="menu.status" @change="updateEnq(menu.id,$event.target)">
                    <option value="1">Pending</option>
                    <option value="2">On Process</option>
                    <option value="3">Applied</option>
                  </select>
                </td>
                <td>
                <router-link :to="'student/'+menu.id">
                  <b-button size="sm"  class="mr-1 btn-primary">
                    View
                  </b-button>
                </router-link>
                  <b-button size="sm"  class="mr-1 btn-danger" @click="deleter(menu, index, $event.target)">
                    Delete
                  </b-button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="5">
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
import moment from 'moment'
  export default {
    data() {
      return {
        filterBy:0,
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
      filterData(){
        var self = this
        var filter = this.filterBy
        if(Array.isArray(this.applications)){
          return this.applications.filter(i=>{
            if(filter == 0){
              return i;
            }
            if(i.status == filter){
              return i;
            }
          })
        }
      }
    },
    methods: {
      format(date) {
        return moment(String(date)).format('MMM DD, YYYY')
      },
      updateEnq(item, el) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/application_form/edit/' + item;
        var val = el.value;
        axios.post(url, {
          val: val
        }).then(response => {
          self.applications = response.data.data;
          self.$swal({
            type: 'success',
            title: 'Application updated successfully.',
            showConfirmButton: true,
            customClass: 'crm-swal',
            confirmButtonText: 'Thanks',
          })
        })
      },

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
      deleter(item,row,event){
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
      }
    },
  }
</script>
