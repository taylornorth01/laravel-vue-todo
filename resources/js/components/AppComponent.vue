<template>
    <section>
      <header-component></header-component>

      <task-list-component 
        v-bind:tasks="this.taskMeta.data">
      </task-list-component>

      <footer-component 
        v-bind:metadata="this.taskMeta.meta"
        v-on:changePage="getPage">
      </footer-component>
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
          getPage(page) {
            if (page !== undefined) {
              console.log("Updating page.");
              axios.get('/' + page.url.split('/').pop()).then(response => {
                console.log("Response: ", response.data);
                this.taskMeta = response.data
              });
            }
          }
        }
    }
</script>