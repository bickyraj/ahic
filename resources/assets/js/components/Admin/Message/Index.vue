<template>
  <div class="animated">
    <b-row>
      <b-col md="6">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Messages</h5>
            </div>
            <div class="caption card-title-actions">

            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody v-if="table_items.length > 0" v-show="!loading">
              <tr v-for="(role, index) in table_items" :key="role.id">
                <td>{{ format(role.created_at) }}</td>
                <td>{{ role.name }}</td>
                <td>
                  <b-button size="sm" @click.stop="view(role, index, $event.target)" class="mr-1 btn-primary">
                    View
                  </b-button>
                  <b-button size="sm" @click="deleteRole(role, index, $event.target)" class="mr-1 btn-danger">
                    Delete
                  </b-button>
                </td>
              </tr>
            </tbody>
            <tbody v-else>
              <tr>
                <td colspan="3">
                  <div v-if="!loading"> No Data.</div>
                  <div v-else> loading...</div>
                </td>
              </tr>
            </tbody>
          </table>
        </b-card>
      </b-col>

      <b-col md="6" v-if="message">
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Message</h5>
            </div>
            <div class="caption card-title-actions">
              <b-button size="sm" @click.stop="message =''" class="mr-1 btn-danger">
                Close
              </b-button>
            </div>
          </div>
          <table class="table table-hovered">
            <tr>
              <th> Name</th>
              <td> {{message.name}}</td>
            </tr>
            <tr>
              <th> Email</th>
              <td> {{message.email}}</td>
            </tr>
            <tr>
              <th> Contact</th>
              <td> {{message.contact}}</td>
            </tr>
            <tr>
              <th>Message</th>
              <td> {{message.message}}</td>
            </tr>
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
        message:'',
        loading: true,
        table_items: [],
        role_table_fields: ['name', 'email','contact','message','created_at'],
        modalInfo: {
          title: '',
          content: '',
          data: []
        },
      }
    },
    created() {
      this.fetchMessages();
    },
    computed: {

    },
    methods: {
      format(date){
          return moment(String(date)).format('MMM DD, YYYY')
      },
      view(item){
        this.message = item
      },
      info(item, index, button) {
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/message/';
        axios.get(url + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Message Status`
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
        this.modalInfo.title = 'Edit Role'
        this.modalInfo.content = ''
      },
      deleteRole: function(item, row, event) {
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
            let url = self.$root.baseUrl + '/api/admin/message/';
            axios.delete(url + item.id).then(function(response) {
                if (response.status === 200) {
                  self.table_items = response.data.data;
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
      fetchMessages() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/messages';
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
      hideRoleModal() {
        this.$refs.editModal.hide();
      },
    },
  }
</script>
