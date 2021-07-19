<template>
	<div>
		<input type="text" placeholder="Task title" v-model="title" />
		<input type="text" placeholder="Task description" v-model="description" />
		<button @click="createTask">Create task</button>
	</div>
</template>

<script>
export default {
	mounted() {
		console.log("New task form component mounted.");
	},

	data() {
		return {
			title: "",
			description: ""
		};
	},

	methods: {
		createTask() {
			console.log("Creating a new task.");
			axios
				.post("/tasks", { task_title: this.title, text_body: this.description })
				.then((res) => {
					console.log("Task creation successful.");
				})
				.catch((err) => console.error("Task creation failed.", err));
		}
	}
};
</script>
