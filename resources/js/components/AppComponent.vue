<template>
	<div>
		<new-task-form></new-task-form>
		<list-component :tasks="tasks"></list-component>
		<page-navigation
			:links="meta.links"
			:meta="meta.data"
			@loadPage="requestPage"
		></page-navigation>
	</div>
</template>

<script>
import ListComponent from "../../mock_practice/ListComponent.vue";
import NewTaskForm from "./NewTaskForm.vue";
import PageNavigation from "./PageNavigation.vue";
export default {
	components: { ListComponent, NewTaskForm, PageNavigation },
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
		},

		requestPage(link) {
			axios
				.get(link)
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
