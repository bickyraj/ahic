<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Contact </h5>
            </div>
            <div class="caption card-title-actions">
              <b-button @click="showModal" variant="primary" class="btn btn-sm green pull-right" v-if="table_items && table_items.length == 0 ">Add Contact Details</b-button>
              <b-button @click="edit" variant="success" class="btn btn-sm green pull-right" v-else>Edit</b-button>
            </div>
          </div>

          <table class="table">
            <tr>
              <th class="text-uppercase">name</th>
              <td v-if="table_items.name">{{table_items.name}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">phone</th>
              <td v-if="table_items.phone">{{table_items.phone}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">address</th>
              <td v-if="table_items.address">{{table_items.address}}</td>
            </tr>

            <tr>
              <th class="text-uppercase">street name</th>
              <td v-if="table_items.street_name">{{table_items.street_name}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">email</th>
              <td v-if="table_items.email">{{table_items.email}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">Facebook</th>
              <td v-if="table_items.fb">{{table_items.fb}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">Instagram</th>
              <td v-if="table_items.in">{{table_items.in}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">Twitter</th>
              <td v-if="table_items.tw">{{table_items.tw}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">Youtube</th>
              <td v-if="table_items.yt">{{table_items.yt}}</td>
            </tr>

            <tr>
              <th class="text-uppercase">ABN</th>
              <td v-if="table_items.ABN">{{table_items.ABN}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">RTO</th>
              <td v-if="table_items.RTO">{{table_items.RTO}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">CRICOS</th>
              <td v-if="table_items.CRICOS">{{table_items.CRICOS}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">Call Time</th>
              <td v-if="table_items.call_time">{{table_items.call_time}}</td>
            </tr>
            <tr>
              <th class="text-uppercase">Message</th>
              <td v-if="table_items.message">{{table_items.message}}</td>
            </tr>
          </table>

        </b-card>
      </b-col>
    </b-row>




    <b-modal class="ess-modal" ref="myModalRef" hide-footer title="Add Contact">
      <form @submit.prevent="addContact" ref="addContactForm">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Street Name</label>
          <input type="text" name="street_name" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="">Facebook</label>
          <input type="text" name="fb" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Twitter</label>
          <input type="text" name="tw" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Instagram</label>
          <input type="text" name="in" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Youtube</label>
          <input type="text" name="yt" class="form-control" placeholder="">
        </div>
        <div class="form-group">
          <label for="">ABN</label>
          <input type="text" name="ABN" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="">RTO</label>
          <input type="text" name="RTO" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="">CRICOS</label>
          <input type="text" name="CRICOS" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="">Call Time</label>
          <input type="text" name="call_time" class="form-control"  >
        </div>
        <div class="form-group">
          <label for="">Message</label>
          <textarea name="message" class="form-control" placeholder="">
          </textarea>
        </div>
        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Create Contact</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn>
      </form>
    </b-modal>
    <!-- Info modal -->
    <b-modal class="ess-modal" id="modalInfo" ref="editModal" hide-footer @hide="resetModal" :title="modalInfo.title">
      <form @submit.prevent="editContact" :row="modalInfo.row" ref="editContactForm">
        <input type="hidden" name="id" :value="modalInfo.data.id">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="name" class="form-control" placeholder="" required :value="modalInfo.data.name">
        </div>
        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="" required :value="modalInfo.data.phone">
        </div>
        <div class="form-group">
          <label for="">Address</label>
          <input type="text" name="address" class="form-control" placeholder="" required :value="modalInfo.data.address">
        </div>
        <div class="form-group">
          <label for="">Street Name</label>
          <input type="text" name="street_name" class="form-control" placeholder="" required :value="modalInfo.data.street_name">
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="email" class="form-control" placeholder="" required :value="modalInfo.data.email">
        </div>
        <div class="form-group">
          <label for="">Facebook</label>
          <input type="text" name="fb" class="form-control" placeholder="" :value="modalInfo.data.fb">
        </div>
        <div class="form-group">
          <label for="">Twitter</label>
          <input type="text" name="tw" class="form-control" placeholder="" :value="modalInfo.data.tw">
        </div>
        <div class="form-group">
          <label for="">Instagram</label>
          <input type="text" name="in" class="form-control" placeholder="" :value="modalInfo.data.in">
        </div>
        <div class="form-group">
          <label for="">Youtube</label>
          <input type="text" name="yt" class="form-control" placeholder="" :value="modalInfo.data.yt">
        </div>
        <div class="form-group">
          <label for="">ABN</label>
          <input type="text" name="ABN" class="form-control" :value="modalInfo.data.ABN" >
        </div>
        <div class="form-group">
          <label for="">RTO</label>
          <input type="text" name="RTO" class="form-control"  :value="modalInfo.data.RTO">
        </div>
        <div class="form-group">
          <label for="">CRICOS</label>
          <input type="text" name="CRICOS" class="form-control" :value="modalInfo.data.CRICOS" >
        </div>
        <div class="form-group">
          <label for="">Call Time</label>
          <input type="text" name="call_time" class="form-control"  :value="modalInfo.data.call_time">
        </div>
        <div class="form-group">
          <label for="">Message</label>
          <textarea name="message" class="form-control" placeholder="" :value="modalInfo.data.message">
          </textarea>
        </div>

        <b-btn class="mt-3 pull-right" variant="primary" type="submit">Update</b-btn>
        <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideContactModal">Cancel</b-btn>
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
    this.fetchContacts();
  },
  computed: {

  },
  methods: {
    edit() {
      let self = this;
      self.modalInfo.title = `Edit Enquiry`
      self.modalInfo.data =this.table_items
      self.modalInfo.content = JSON.stringify(this.table_items, null, 2)
      self.$root.$emit('bv::show::modal', 'modalInfo')
    },
    resetModal() {
      this.modalInfo.title = 'Edit Enquiry'
      this.modalInfo.content = ''
    },
    editContact: function() {
      var self = this;
      var form = self.$refs.editContactForm;
      var row_index = form.getAttribute('row');
      var formData = new FormData(form);
      let url = self.$root.baseUrl + '/api/admin/contact/edit';
      axios.post(url, formData).then(function(response) {
        if (response.status === 200) {
          self.table_items = response.data.data[0];
          self.hideContactModal();
          self.$swal({
            // position: 'top-end',
            type: 'success',
            title: 'Contact Information has been updated successfully.',
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

    addContact: function() {
      var self = this;
      var form = self.$refs.addContactForm;
      var formData = new FormData(form);
      let url = self.$root.baseUrl + '/api/admin/contact';
      axios.post(url, formData).then(function(response) {
          self.table_items= response.data.data[0];
        $(form)[0].reset();
        self.hideModal();
        self.$toastr.s("Contact data has been added.");
      })
      .catch(function(error) {
        if (error.response.status === 422) {
          self.$toastr.e(error.response.data.errors.name);
        }
      });
    },
    fetchContacts() {
      let vm = this;
      let self = this;
      let url = self.$root.baseUrl + '/api/admin/contact';
      axios.get(url)
      .then(function(response) {
        if(response.data.data[0]){
          self.table_items= response.data.data[0];
        }
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
    hideContactModal() {
      this.$refs.editModal.hide();
    },
  },
}
</script>
