<template>
	<div>
		App
	</div>
</template>

<script>
export default {
	mounted() {
		console.log("App component mounted.");
		this.initializeApp();
	},

	data() {
		return {
			isLoading: true,
			tasks: [],
			meta: { links: [], data: [] }
		};
	},

	methods: {
		initializeApp() {
			console.log("App loading...");
			axios
				.get("/tasks")
				.then((res) => {
					console.log("Request successful.");
					this.tasks = res.data.data;
					this.meta = { links: res.data.links, data: res.data.meta };
				})
				.catch((err) => console.error("Request failed.", err))
				.then(() => (this.isLoading = false));
		}
	}
};
</script>
