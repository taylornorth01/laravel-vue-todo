<template>
	<li>
		{{ task.task_title }}<br />{{ task.text_body }}<br />{{ task.date_created }}
	</li>
</template>

<script>
export default {
	mounted() {
		console.log("Task component mounted.");
	},

	props: ["task"]
};
</script>
