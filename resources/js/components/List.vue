<template>
	<div class="task__list">
		<ul class="list__style__none">
			<task
				v-for="task in tasks"
				:key="task.id"
				:task="task"
				@refresh="$emit('refresh')"
			></task>
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
