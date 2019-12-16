<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-table"></i> Models</h5>
            </div>
          </div>
          <table class="table trump-table table-hover">
            <thead>
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            	<tr>
            		<td>User Table</td>
            		<td>
            		  <b-button size="sm" @click="exportTable(1)" class="mr-1 btn-blue">
						<i class="fas fa-cloud-download-alt"></i> Export To Excel
            		  </b-button>
            		</td>
            	</tr>
	        	<tr>
	        		<td>Role Table</td>
	        		<td>
	        		  <b-button size="sm" @click="exportTable(2)" class="mr-1 btn-blue">
						<i class="fas fa-cloud-download-alt"></i> Export To Excel
	        		  </b-button>
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
      <form @submit.prevent="editRole" :row="modalInfo.row" ref="editRoleForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" v-bind:value="modalInfo.data.name" class="form-control" placeholder="" required>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideRoleModal">Cancel</b-btn>
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
      // let socket = io(`http://localhost:3000`);

      // socket.on('connect', function() {
      //   if (socket.connect) {
      //     console.log('connected bro');
      //   }
      // });
      this.fetchRoles();
      // socket.on("test-channel:App\\Events\\TestNotification", function(message){
      //     // increase the power everytime we load test route
      //     // alert(parseInt(message.data.power))
      //     console.log(message.data.users);
      // });
    },
    computed: {
      // edit_option_for_parent_role: function (roleOptionId, parentId, roleId) {
      //  console.log(roleOptionId);
      // }
    },
    methods: {
      info(item, index, button) {
        let self = this;
        axios.get('../api/admin/role/' + item.id).then(function(response) {
            if (response.status === 200 || response.status === 201) {
              self.modalInfo.row = index
              self.modalInfo.title = `Edit Role`
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
      editRole: function() {
        var self = this;
        var form = self.$refs.editRoleForm;
        var row_index = form.getAttribute('row');
        var formData = new FormData(form);
        axios.post('../api/admin/edit-role', formData).then(function(response) {
            if (response.status === 200) {
              var role = response.data.data;
              self.table_items[row_index].name = role.name;
              self.hideRoleModal();
              self.$swal({
                // position: 'top-end',
                type: 'success',
                title: 'Role updated successfully.',
                showConfirmButton: true,
                // timer: 1500,
                customClass: 'crm-swal',
                confirmButtonText: 'Thanks',
              })
            }
          })
          .catch(function(error) {});
      },
      exportTable: function(type) {
      	let self = this
        let url = self.$root.baseUrl + '/admin/export-table/' + type;

        var win = window.open(url, '_blank');
		win.focus();

		self.$swal({
		  // position: 'top-end',
		  type: 'success',
		  title: 'Exported updated successfully.',
		  showConfirmButton: true,
		  // timer: 1500,
		  customClass: 'crm-swal',
		  confirmButtonText: 'Thanks',
		})

      	// axios.post(url, {type: type}).then(function(response) {
       //      if (response.status === 200) {
       //        self.$swal({
       //          // position: 'top-end',
       //          type: 'success',
       //          title: 'Exported updated successfully.',
       //          showConfirmButton: true,
       //          // timer: 1500,
       //          customClass: 'crm-swal',
       //          confirmButtonText: 'Thanks',
       //        })
       //      }
       //    })
       //    .catch(function(error) {});
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