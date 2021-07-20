<template>
	<li class="task__item">
		<div v-if="!isEditVisible" class="task__wrap">
			<div class="task__details">
				<div>
					<p class="task__title">{{ task.task_title }}</p>
					<p class="task__date">{{ task.date_created.split(" ").shift() }}</p>
				</div>
				<div class="task__state" v-bind:class="isComplete"></div>
			</div>
			<div class="task__body">
				{{ task.text_body }}
			</div>
			<div class="task__options">
				<button @click="isEditVisible = !isEditVisible">Edit</button>
				<button @click="deleteTask">Delete</button>
			</div>
		</div>
		<div v-else class="task__wrap">
			<div class="task__details">
				<input type="text" v-model="title" />
				<div class="task__state__edit" v-bind:class="isComplete"></div>
			</div>
			<div class="task__body">
				<input type="text" v-model="description" />
				<div class="task__submit">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="30"
						height="30"
						fill="currentColor"
						class="bi bi-arrow-right-square-fill"
						viewBox="0 0 16 16"
						@click="editTask"
					>
						<path
							d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z"
						/>
					</svg>
				</div>
			</div>
			<div class="task__options">
				<button @click="isEditVisible = !isEditVisible">Edit</button>
				<button @click="deleteTask">Delete</button>
			</div>
		</div>
	</li>
</template>

<script>
export default {
	mounted() {
		console.log("Task component mounted.");
	},

	data() {
		console.log(this.task.complete);
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
				.catch((err) => console.error("Task editing failed.", err))
				.then(() => this.$emit("refresh"));
		},

		deleteTask() {
			console.log("Deleting task.");
			axios
				.delete("/tasks/" + this.task.id)
				.then((res) => {
					console.log("Task deleting successful.");
				})
				.catch((err) => console.error("Task deleting failed.", err))
				.then(() => this.$emit("refresh"));
		}
	},

	computed: {
		isComplete() {
			return this.task.completed == 1 ? "green" : "red";
		}
	}
};
</script>
