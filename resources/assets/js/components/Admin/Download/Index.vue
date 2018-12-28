<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Downloads</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right">Add New Download</b-button>
              <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Download">
                <form @submit.prevent="addDownload" ref="addDownloadForm">
                  <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">File</label>
                    <input type="file" name="file" class="form-control"  >
                  </div>
                  <b-btn class="mt-3 pull-right" variant="primary" type="submit">Add Download</b-btn>
                  <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
                </form>
              </b-modal>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Title</th>
                <th>File Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(enquiry, index) in table_items" :key="enquiry.id">
                <td>{{ enquiry.title }}</td>
                <td v-if="enquiry.file">{{ enquiry.file }}</td>
                <td v-else> -- </td>
                <td>
                  <a  :href="'../public/downloads/'+enquiry.file" download >
                    <b-button size="sm" class="btn-primary">
                      <i class="fa fa-download"></i>
                    </b-button>
                  </a>
                  <b-button size="sm" @click.stop="info(enquiry, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteDownload(enquiry, index, $event.target)" class="mr-1 btn-danger">
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
      <!-- <pre>{{ modalInfo.data }}</pre> -->
      <form @submit.prevent="editDownload" :row="modalInfo.row" ref="editDownloadForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Title</label>
          <input type="text" name="title" v-bind:value="modalInfo.data.title" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">File</label>
          <input type="file" name="file"  class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Status</label>
          <select class="form-control" name="status" v-model="modalInfo.data.status" >
            <option value="0">Disable</option>
            <option value="1">Enable</option>
          </select>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideDownloadModal">Cancel</b-btn>
      </form>
    </b-modal>
  </div>
</template>
<script>
  export default {
    data() {
      return {
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

      this.fetchDownloads();

    },
    computed: {

    },
    methods: {
      updateDownload(item,index,el){
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/download/edit/'+item;
        var val = el.value;
        axios.post(url,{val:val}).then(response=>{
          self.table_items = response.data.data;
          self.$swal({
            // position: 'top-end',
            type: 'success',
            title: 'Enquiry updated successfully.',
            showConfirmButton: true,
            // timer: 1500,
            customClass: 'crm-swal',
            confirmButtonText: 'Thanks',
          })
        })
      },
      info(item, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/download/';
        axios.get(url + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Download`
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
      editDownload: function() {
        var self = this;
        var form = self.$refs.editDownloadForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/download/edit';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              self.table_items = response.data.data;
              self.hideDownloadModal();
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
      deleteDownload: function(item, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/download/';
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
      addDownload: function() {
        var self = this;
        var form = self.$refs.addDownloadForm;
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/download';
        axios.post(url, formData).then(function(response) {
              self.table_items= response.data.data;
              $(form)[0].reset();
              self.hideModal();
              self.$toastr.s("A download has been added.");
          })
          .catch(function(error) {
            if (error.response.status === 422) {
              self.$toastr.e(error.response.data.errors.name);
            }
          });
      },
      fetchDownloads() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/downloads';
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
      hideDownloadModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
