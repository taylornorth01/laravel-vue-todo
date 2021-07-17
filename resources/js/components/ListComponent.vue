<template>
  <section>
    <ul>
      <li v-for="task in tasks" :key="task.id" >
        <p>{{ task.task_title }} -- {{ task.text_body }}</p>
        <button>Edit</button>
        <button>View</button>
        <button v-on:click="deleteTask(task.id)">Delete</button>
      </li>
    </ul>
  </section>
</template>

<script>
  export default {
    mounted() {
      console.log('Task list component mounted.');
    },

    props: ['tasks'],

    methods: {
      deleteTask(id) {
        axios.delete("/tasks/" + id).then(response => console.log(response));
        this.$emit('refreshList');
      }
      
    }
  }
</script>