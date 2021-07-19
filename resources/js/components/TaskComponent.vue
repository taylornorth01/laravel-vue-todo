<template>
	<div>
		<li>
			<div v-if="!isEditVisible">
				{{ task.task_title }} - {{ task.text_body }}<br />{{
					task.date_created
				}}
				<button @click="isEditVisible = !isEditVisible">Edit</button>
				<button @click="deleteTask">Delete</button>
			</div>
			<div v-else>
				<input type="text" v-model="title" />
				<input type="text" v-model="description" />
				<button @click="editTask">Submit</button>
			</div>
		</li>
	</div>
</template>

<script>
export default {
	mounted() {
		console.log("Task component mounted.");
	},

	data() {
		return {
			isEditVisible: false,
			title: this.task.task_title,
			description: this.task.text_body
		};
	},

	props: ["task"],

	methods: {
		editTask() {
			console.log("Editing task.");
			this.isEditVisible = !this.isEditVisible;
			axios
				.put("/tasks/" + this.task.id, {
					task_title: this.title,
					text_body: this.description
				})
				.then((res) => {
					console.log("Task editing successful.");
				})
				.catch((err) => console.error("Task editing failed.", err));
		},

		deleteTask() {
			console.log("Deleting task.");
			axios
				.delete("/tasks/" + this.task.id)
				.then((res) => {
					console.log("Task deleting successful.");
				})
				.catch((err) => console.error("Task deleting failed.", err));
		}
	}
};
</script>
