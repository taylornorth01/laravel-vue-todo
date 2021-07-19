<template>
	<div>
		<ul v-for="task in tasks" :key="task.id">
			<task :task="task" @refresh="$emit('refresh')"></task>
		</ul>
	</div>
</template>

<script>
import Task from "./Task.vue";
export default {
	components: { Task },
	mounted() {
		console.log("List component mounted.");
	},

	props: ["tasks"]
};
</script>
