<template>
    <!-- <p>{{ task.task_title }} -- {{ task.text_body }}</p>
    <button v-on:click="showForm">Edit</button>
    <button>View</button>
    <button v-on:click="deleteTask(task.id)">Delete</button>

    <div v-if="isShowForm">
      <input type="text" v-model="title" placeholder="title">
      <input type="text" v-model="text" placeholder="text">
      <button v-on:click="editTask(task.id)">Submit</button>
    </div> -->
    <div class="task__item">
        <div class="task__details">
          <div>
            <div class="task__title">
              {{ task.task_title }}
            </div>
            <div class="task__date">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
              </svg>
              {{ task.date_created.split(' ').shift() }}
            </div>
          </div>
          <div class="task__state"></div>
        </div>
        <div class="flex__spacebetween">
          <div class="task__content">
            {{ task.text_body }}
            <div v-if="isShowForm">
      <input type="text" v-model="title" placeholder="title">
      <input type="text" v-model="text" placeholder="text">
      <button v-on:click="editTask(task.id)">Submit</button>
    </div>
          </div>
          <div class="task__options" @click="isShowMenu = !isShowMenu">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <div class="task__menu" v-if="isShowMenu">
              <p v-on:click="showForm">Edit</p>
              <p v-on:click="deleteTask(task.id)">Delete</p>
            </div>
          </div>
        </div>
        
      </div>
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
        isShowMenu: false,
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