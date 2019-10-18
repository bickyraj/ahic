<template>
	<div>
		<div class="login-background">
            <!-- <router-link title="Go To Home Page" :to="{ name: 'home'}" class="mr-1 btn btn-sm" style="position: absolute; top: 12px; left: 12px; z-index: 99999; color: #e6ebf1;"><i class="fas fa-long-arrow-alt-left"></i> Go To Home Page</router-link> -->
		    <div class="login-container">
                <b-col class="login-form-div">
                    <div class="navbar-brand ahic-login-logo-block">
                      <a class="logo-default" href="index.php">
                        <div class="" style="float:left;">
                          <img alt="" :src="logo" class="responsive" width="60">
                        </div>
                        <div class="marginTop-8" style="float:left; padding-left:15px;">
                          <div class="">
                            <span class="font-weight-bold" style="color: #dc0102;"> Harbour College </span>
                          </div>
                          <div style="margin-top:-10px;">
                             <small class="text-primary" style="font-size:12px;"> "Where Seekers Become Achievers"</small>

                          </div>
                        </div>
                        </a>
                    </div>
                	<form class="login-form" @submit.prevent="login">
                	    <div class="form-title">
                	        <span class="form-title">Welcome.</span>
                	        <span class="form-subtitle">Please login.</span>
                	    </div>
                	    <div class="form-group">
                	        <input v-model="email" name="email" v-validate="'required|email'" class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" value="" placeholder="Email" />
	                        <span v-show="errors.has('email')" class="help is-danger custom-input-error"><i v-show="errors.has('email')" class="fas fa-exclamation-circle"></i> {{ errors.first('email') }}</span>
                	    </div>
                	    <div class="form-group">
                	        <input v-model="password" name="password" v-validate="'required'" class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" />
                            <span v-show="errors.has('password')" class="help is-danger custom-input-error"><i v-show="errors.has('password')" class="fas fa-exclamation-circle"></i> {{ errors.first('password') }}</span>
                	    </div>
                	    <div class="form-actions">
                	        <button type="submit" class="btn btn-block btn-submit uppercase">Login</button>
                	    </div>
                        <b-form-checkbox id="checkbox1"
                             v-model="remember_me"
                             value="1"
                             unchecked-value="0">
                                 Remember me
                        </b-form-checkbox>
                	    <!-- <div class="form-actions">
                            <div class="pull-left">
                                <div>
                                                            <input type="checkbox" id="cbx" ref="remember_me" name="remember_me" class="inp-cbx" style="display: none">
                                                            <label for="cbx" class="cbx">
                                                                <span>
                                                                    <svg width="12px" height="10px" viewBox="0 0 12 10">
                                                                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                                    </svg>
                                                                </span>
                                                                <span> Remember me</span>
                                                            </label>
                                </div>
                            </div>
                            <div class="pull-right forget-password-block">
                                <a href="" id="forget-password" class="forget-password">Forgot Password?</a>
                            </div>
                        </div> -->
                	    <!-- <div class="app-logo-container" style="display: inline-block;">
        		        	<img class="app-logo" style="width: 146px; margin-right: 2px;" :src="appstore" alt="logo">
        		        	<img class="app-logo" :src="applestore" alt="logo">
                	    </div> -->
                	</form>
                </b-col>
		    </div>
		    <!-- <div class="login-page-right-container">
		    	<div class="login-app-logo animated fadeInRight">
			        <div class="login-page-title">CRM</div>
			        <small>Basic Crm Using Vue.js</small>
		    	</div>
		    </div> -->
		</div>
	</div>
</template>
<style>
    .ahic-login-logo-block {
        margin-bottom: 15px;
    }
    .marginTop-8 {
        margin-top: 8px;
    }
	.login-logo {
		width: 150px;
		margin-bottom: 30px;
	}

	.app-logo {
		width: 148px;
		margin-top: 42px;
	}
</style>
<script>
export default {
	created: function() {
		// this.$store.commit('SET_LAYOUT', 'login-layout');
	},

    data() {
        return {
            email: "",
            password: "" ,
            remember_me: "",
            logo: this.$root.baseUrl + '/public/front/img/logo-black.png',
            loginBg: this.$root.baseUrl + '/public/img/login-bg.jpg',
            appstore: this.$root.baseUrl + '/public/img/appstore.png',
            applestore: this.$root.baseUrl + '/public/img/applestore.jpg',
        };
    },

    methods: {
        login() {
        	this.$validator.validateAll().then((result) => {
        		if (result) {
		            let data = {
		                email: this.email,
                        password: this.password,
                        remember_me: this.remember_me,
		            };

		            axios.post('./api/login', data)
		            .then(({data}) => {
		            	auth.login(data.token, data.user);
		            })
		            .catch(({response}) => {                    
		            	console.log(response);
		                alert(response.data.message);
		            });
        		}
        	});
        }
    }
}
</script>