<template>
	<section class="main__layout">
		<div class="control__panel">
			<header-component 
				v-on:redirectPage="redirectPage">
			</header-component>
			<footer-component 
				v-bind:metadata="this.taskMeta.meta"
				v-on:changePage="getPage">
			</footer-component>
		</div>
		

		<list-component 
			v-bind:tasks="this.taskMeta.data"
			v-on:refreshList="refreshList">
		</list-component>

		
	</section>
</template>

<script>
	import "../../css/app.css";

	export default {
		mounted(){
			console.log('App component mounted.');
			axios.get(this.currentEndpoint).then(response => {
				console.log("Response: ", response.data);
				this.taskMeta = response.data
			});
		},

		data() {
			return {
				taskMeta: [],
				currentEndpoint: '/tasks'
			}
		},

		methods: {
			getPage(page) {
				if (page !== undefined) {
					console.log("Updating page.");
					this.currentEndpoint = '/' + page.url.split('/').pop();
					axios.get(this.currentEndpoint).then(response => {
						console.log("Response: ", response.data);
						this.taskMeta = response.data
					});
				}
			},

			refreshList() {
				console.log("Refreshing list: ", this.currentEndpoint);
				axios.get(this.currentEndpoint).then(response => {
					console.log("Response: ", response.data);
					this.taskMeta = response.data
				});
			},

			redirectPage() {
				console.log("Redirecting to first page.");
				this.currentEndpoint = "/tasks";
				axios.get(this.currentEndpoint).then(response => {
					console.log("Response: ", response.data);
					this.taskMeta = response.data
				});
			}
		}
	}
</script>