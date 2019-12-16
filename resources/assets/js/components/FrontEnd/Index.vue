<template>
	<div class="animated">
		<b-container>
			<b-row style="margin-top: 20px;">
				<b-col>
					<div class="pull-right">
						<router-link title="Admin Login" :to="{ name: 'login'}" class="mr-1 btn btn-sm btn-primary"><i class="fa fa-user"></i> Admin Login</router-link>
					</div>
				</b-col>
			</b-row>
			<b-row class="justify-content-md-center" style="margin-top: 50px;">
				<a href="" class="navbar-brand gym-navbar-brand" target="_self"> Welcome to CRM </a>
			</b-row>
		</b-container>
	</div>
</template>
<script>
	export default {
		data() {
			return {
				appUrl: this.$root.baseUrl,
			}
		},
		methods: {
		}
	}
</script>