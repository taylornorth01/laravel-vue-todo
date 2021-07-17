<template>
	<section>
    <p>{{ task.task_title }} -- {{ task.text_body }}</p>
    <button>Edit</button>
    <button>View</button>
    <button v-on:click="deleteTask(task.id)">Delete</button>
  </section>
</template>

<script>
	export default {
		mounted() {
			console.log('Task component mounted.')
		},

    props: ['task'],

    methods: {
      deleteTask(id) {
        axios.delete("/tasks/" + id)
        .then(response => console.log(response))
        .catch(error => console.log("Error destroying task: ", error));
        this.$emit('refreshList');
      }
    }
	}
</script>