<template>
	<ul class="list__style__none task__list">
		<task
			v-for="task in tasks"
			:key="task.id"
			:task="task"
			@refresh="$emit('refresh')"
		></task>
	</ul>
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
