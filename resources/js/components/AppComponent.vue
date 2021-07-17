<template>
    <section>
      <header-component></header-component>

      <task-list-component v-bind:tasks="this.taskMeta.data"></task-list-component>

      <footer-component></footer-component>
    </section>
</template>

<script>
    export default {
        mounted(){
          console.log('App component mounted.');
          axios.get('/tasks').then(response => {
            console.log("Response: ", response.data);
            this.taskMeta = response.data
          });
        },

        data() {
          return {
            taskMeta: []
          }
        },

        methods: {
          
        }
    }
</script>