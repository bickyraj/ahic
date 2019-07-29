<template>
  <div class="animated">
    <b-row>
      <b-col md="6">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Newsletters</h5>
            </div>
            <div class="caption card-title-actions">

            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(newletter, index) in table_items" :key="newletter.id">
                <td>{{ newletter.email }}</td>
                <td>
                  <b-button size="sm" @click.stop="info(newletter, index, $event.target)" class="mr-1 btn-success">
                    Edit
                  </b-button>
                  <b-button size="sm" @click="deleteNewsletter(newletter, index, $event.target)" class="mr-1 btn-danger">
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
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fab fa-typo3"></i> Send Email</h5>
            </div>
          </div>
          <div>
            <form @submit.prevent="addEmail" ref="addEmailForm">
              <!-- <div class="form-group">
                <b-img center ref="image_preview" class="custom-form-image-preview" style="margin-bottom:10px;" :src="imagePreview" alt="center image" />
                <input type="file" ref="input_image" name="file" style="display:none;" v-on:change="handleFileUpload()">
                <div class="button-group">
                  <b-button class="mx-auto d-block" @click = "clickFileInupt">Upload Icon</b-button>
                  <b-button class="mx-auto d-block custom-remove-btn" @click = "clickRemoveFileInupt"><i class="fa fa-times"></i></b-button>
                </div>
              </div> -->
              <div class="form-group">
                <label for="">Subject</label>
                <input type="text" class="form-control" name="subject">
              </div>
              <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" id="" required="required" cols="30" rows="10" class="form-control"></textarea>
              </div>
              <b-btn class="mt-3 pull-right" variant="primary" type="submit">Sent Email</b-btn>
            </form>
          </div>
        </b-card>
      </b-col>
    </b-row>
    <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <!-- <pre>{{ modalInfo.data }}</pre> -->
      <form @submit.prevent="editNewsletter" :row="modalInfo.row" ref="editNewsletterForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" v-bind:value="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideNewsletterModal">Cancel</b-btn>
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
        role_table_fields: ['name', 'email'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchNewsletters();
    },
    computed: {

    },
    methods: {
      addEmail: function() {
        var self = this;
        var form = self.$refs.addEmailForm;
        var formData = new FormData(form);
        // var des = this.getAddEmailContent;
        // formData.append('description', des);
        let url = this.$root.baseUrl + '/api/admin/send-email-to-subscribers';

        axios.post(url, formData).then(function(response) {
          if (response.status === 200) {
            var email = response.data.data;
            $(form)[0].reset();
            self.$toastr.s("Email has been sent.");
          }
        })
        .catch(function(error) {
          self.unique = false;
        });
      },
      info(item, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/newsletter/';
        axios.get(url + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Newsletter`
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
        this.modalInfo.title = 'Edit Newsletter'
        this.modalInfo.content = ''
      },
      editNewsletter: function() {
        var self = this;
        var form = self.$refs.editNewsletterForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        let url = self.$root.baseUrl + '/api/admin/newsleter';
        axios.post(url, formData).then(function(response) {
            if (response.status === 200) {
              self.table_items = response.data.data;
              self.hideNewsletterModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Newsletter updated successfully.',
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
      deleteNewsletter: function(item, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/newsletter/';
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
      fetchNewsletters() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/newsletters';
        axios.get(url)
          .then(function(response) {
            vm.table_items = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            vm.loading = false;
          });
      },
      showModal() {
        this.$refs.myModalRef.show()
      },
      hideModal() {
        this.$refs.myModalRef.hide()
      },
      hideNewsletterModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
