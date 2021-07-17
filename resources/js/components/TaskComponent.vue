<template>
	<section>
    <p>{{ task.task_title }} -- {{ task.text_body }}</p>
    <button v-on:click="showForm">Edit</button>
    <button>View</button>
    <button v-on:click="deleteTask(task.id)">Delete</button>

    <div v-if="isShowForm">
      <input type="text" v-model="title" placeholder="title">
      <input type="text" v-model="text" placeholder="text">
      <button v-on:click="editTask(task.id)">Submit</button>
    </div>
  </section>
</template>

<script>
	export default {
		mounted() {
			console.log('Task component mounted.')
		},

    props: ['task'],

    data() {
			return {
				isShowForm: false,
				title: this.task.task_title,
				text: this.task.text_body
			}
		},

    methods: {
      showForm() {
				this.isShowForm = !this.isShowForm;
			},

      deleteTask(id) {
        axios.delete("/tasks/" + id)
        .then(response => console.log(response))
        .catch(error => console.log("Error destroying task: ", error))
        .then(() => this.$emit('refreshList'));
      },

      editTask(id) {
        axios.put("/tasks/" + id, {
          task_title: this.title,
          text_body: this.text
        })
        .then(response => console.log(response))
        .catch(error => console.log("Error destroying task: ", error))
        .then(() => this.$emit('refreshList'));
        this.showForm();
      }
    }
	}
</script>