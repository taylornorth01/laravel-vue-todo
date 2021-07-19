<template>
	<div>
		<new-task-form @gotoFirstPage="loadFirstPage"></new-task-form>
		<list :tasks="tasks" @refresh="refreshPage"></list>
		<page-navigation
			:links="meta.links"
			:meta="meta.data"
			@loadPage="requestPage"
		></page-navigation>
	</div>
</template>

<script>
import List from "./List.vue";
import NewTaskForm from "./NewTaskForm.vue";
import PageNavigation from "./PageNavigation.vue";
export default {
	components: { List, NewTaskForm, PageNavigation },
	mounted() {
		console.log("App component mounted.");
		this.initializeApp();
	},

	data() {
		return {
			isLoading: true,
			tasks: [],
			meta: { links: [], data: [] },
			currentEndpoint: "/tasks"
		};
	},

	methods: {
		initializeApp() {
			console.log("App loading...");
			this.isLoading = true;
			axios
				.get(this.currentEndpoint)
				.then((res) => {
					console.log("Request successful.");
					this.tasks = res.data.data;
					this.meta = { links: res.data.links, data: res.data.meta };
					this.isLoading = false;
				})
				.catch((err) => console.error("Request failed.", err));
		},

		requestPage(link) {
			this.currentEndpoint = link;
			this.isLoading = true;
			axios
				.get(link)
				.then((res) => {
					console.log("Request successful.");
					this.tasks = res.data.data;
					this.meta = { links: res.data.links, data: res.data.meta };
					this.isLoading = false;
				})
				.catch((err) => console.error("Request failed.", err))
				.then(() => (this.isLoading = false));
		},

		refreshPage() {
			console.log("Refreshing page.");
			this.isLoading = true;
			axios
				.get(this.currentEndpoint)
				.then((res) => {
					console.log("Request successful.");
					this.tasks = res.data.data;
					this.meta = { links: res.data.links, data: res.data.meta };
					this.isLoading = false;
				})
				.catch((err) => console.error("Request failed.", err))
				.then(() => (this.isLoading = false));
		},

		loadFirstPage() {
			console.log("Redirecting to first page.");
			this.isLoading = true;
			axios
				.get("/tasks")
				.then((res) => {
					console.log("Request successful.");
					this.tasks = res.data.data;
					this.meta = { links: res.data.links, data: res.data.meta };
					this.isLoading = false;
				})
				.catch((err) => console.error("Request failed.", err));
		}
	}
};
</script>
