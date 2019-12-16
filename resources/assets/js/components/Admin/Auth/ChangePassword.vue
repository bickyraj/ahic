<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2">
	          <h5 class="card-title">Change Password</h5>
	          <hr>
          	<div>
	            <form class="horizontal-form" @submit.prevent="handleForm" ref="pwdForm">
	              <div class="form-group">
	                <label for="">Old Password</label>
	                <input type="password" name="oldpassword" class="form-control" placeholder="" required>
	              </div>
	              <div class="form-group">
	                <label for="">New Password</label>
	                <input v-model="password" name="password" class="form-control" title="Password must contain at least 6 characters, including at least a number" type="password" required>
	              </div>
	              <div class="form-group">
	                <label for="">Confirm Password</label>
	                <input v-model="confirmpassword" class="form-control" ref="confirmpassword" title="Please enter the same Password as above" type="password" required name="confirmpassword">
	              </div>
	              <span class="error" v-show="pwdError">The password and confirm password must be same.</span>
	              <b-btn class="mt-3 pull-right" variant="primary" type="submit">Change</b-btn>
	              <!-- <b-btn class="mt-3 pull-right" style="margin-right:5px;" variant="default" @click="hideModal">Cancel</b-btn> -->
	            </form>
          	</div>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>
<style>
	.error {
		color: red;
	}
</style>
<script>
  export default {
    data() {
      return {
      	password: '',
      	confirmpassword: '',
      	pwdError: false,
      }
    },
    methods: {
    	pwdForm: function() {

    	},
  		handleForm: function(e)
      {
      	var self = this;
      	var form = self.$refs.pwdForm;
      	var formData = new FormData(form);

      	if (this.password !== this.confirmpassword) {
      		this.pwdError = true;
      	} else {
      		this.pwdError = false;
          let url = self.$root.baseUrl + '/api/admin/change-password';
	      	axios.post(url, formData).then(function(response) {
      	    if (response.data.status === 1) {
      	      $(form)[0].reset();
      	      self.$swal({
      	        // position: 'top-end',
      	        type: 'success',
      	        title: 'Your password has been changed.',
      	        showConfirmButton: true,
      	        // timer: 1500,
      	        customClass: 'crm-swal',
      	        confirmButtonText: 'Ok',
      	      })
      	    } else {
	      	  	self.$toastr.e("Old Password did not matched.")
      	    }
      	  })
      	  .catch(function(error) {
      	  	self.$toastr.e("Something went wrong. Please try again.")
      	  });
      	}
      },
    },
  }
</script>