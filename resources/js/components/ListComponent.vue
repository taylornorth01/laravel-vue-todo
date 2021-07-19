<template>
	<div>
		<ul v-for="task in tasks" :key="task.id">
			<task-component :task="task"></task-component>
		</ul>
	</div>
</template>

<script>
import TaskComponent from "../../mock_practice/TaskComponent.vue";
export default {
	components: { TaskComponent },
	mounted() {
		console.log("List component mounted.");
	},

	props: ["tasks"]
};
</script>
