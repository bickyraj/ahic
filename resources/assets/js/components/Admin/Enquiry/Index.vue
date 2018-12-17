<template>
  <div class="animated">
    <b-row>
      <b-col :cols="cols" >
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Enquiries</h5>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th class="col-md-3">Name</th>
                <th class="col-md-2">Phone</th>
                <th class="col-md-3"> Email</th>
                <th class="col-md-4">Status</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(enquiry, index) in table_items" :key="enquiry.id" @click="view(enquiry,index)">
                <td>{{ enquiry.name }}</td>
                <td>{{ enquiry.phone }}</td>
                <td>{{ enquiry.email }}</td>
                <td>
                  <select class="form-control" name="" v-model="enquiry.status" @change="updateEnq(enquiry.id,enquiry.i,$event.target)">
                    <option value="1">Pending</option>
                    <option value="2">Verified</option>
                    <option value="3">Applied</option>
                  </select>
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

      <b-col cols="6" v-if="enquiry">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Enquiry</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button size="sm" @click="deleteEnquiry(enquiry, index, $event.target)" class="mr-1 btn-danger">
                Delete
              </b-button>
            </div>
          </div>
              <table class="table trump-table">
                  <tr>
                    <th> Name</th>
                    <td>{{ enquiry.name }}</td>
                  </tr>
                  <tr>
                    <th> Phone</th>
                    <td>{{ enquiry.phone }}</td>
                  </tr>
                  <tr>
                    <th> Email</th>
                    <td>{{ enquiry.email }}</td>
                  </tr>
                  <tr>
                    <th> Course </th>
                    <td>{{ enquiry.course_id }}</td>
                  </tr>
                  <tr>
                    <th> Country </th>
                    <td>{{ enquiry.country_id }}</td>
                  </tr>
                  <tr>
                    <th> Message </th>
                    <td>{{ enquiry.message }}</td>
                  </tr>
              </table>

                  <select class="form-control" name="" v-model="enquiry.status" @change="updateEnq(enquiry.id)">
                    <option value="1">Pending</option>
                    <option value="2">Verified</option>
                    <option value="3">Applied</option>
                  </select>

        </b-card>
      </b-col>
    </b-row>
    <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <!-- <pre>{{ modalInfo.data }}</pre> -->
      <form @submit.prevent="editEnquiry" :row="modalInfo.row" ref="editEnquiryForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" v-bind:value="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideEnquiryModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        enquiry:null,
        loading: true,
        table_items: [],
        role_table_fields: ['name', 'action'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchEnquirys();
    },
    computed:{
      cols(){
        if(this.enquiry == null){
          return 12;
        }
        else{
          return 6;
        }
      }
    },
    methods: {
      view(e,i){
        this.enquiry = e;
        this.enquiry.index = i;
      },
      updateEnq(item,index,el){
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/enquiry/edit/'+item;
        var val = el.value;
        axios.post(url,{val:val}).then(response=>{
          self.table_items = response.data.data;
          self.$swal({
            type: 'success',
            title: 'Enquiry updated successfully.',
            showConfirmButton: true,
            customClass: 'crm-swal',
            confirmButtonText: 'Thanks',
          })
        })
      },
      info(item, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/enquiry/';
        axios.get(url + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Enquiry`
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
        this.modalInfo.title = 'Edit Enquiry'
        this.modalInfo.content = ''
      },
      editEnquiry: function() {
        var self = this;
        var form = self.$refs.editEnquiryForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/edit-enquiry';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              var enquiry = response.data.data;
              self.table_items[row_index].name = enquiry.name;
              self.hideEnquiryModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Enquiry updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      deleteEnquiry: function(item, row, event) {
        this.enquiry ="";
        var self = this;
        self.$swal({
          type: 'info',
          title: 'Are you sure you want to delete this?',
          showConfirmButton: true,
          showCancelButton: true,
          customClass: 'crm-swal',
          confirmButtonText: 'Yes',
        }).then((result) => {
          if (result.value) {
            let url = self.$root.baseUrl + '/api/admin/enquiry/';
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
      fetchEnquirys() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/enquiries';
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
      hideEnquiryModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
