<template>
  <section>
    <ul>
      <li v-for="task in tasks.data" :key="task.id" >
        <p>{{ task.task_title }} -- {{ task.text_body }}</p>
      </li>
    </ul>
  </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            axios.get('/tasks').then(response => {
                console.log("Response: ", response.data);
                this.tasks = response.data
            });
        },

        data() {
          return {
            tasks: [],
          }
        },

        methods: {
          
        }
    }
</script>