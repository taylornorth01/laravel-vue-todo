<template>
  <section>
    <ul>
      <li v-for="task in tasks" :key="task.id" >
        <p>{{ task.task_title }} -- {{ task.text_body }}</p>
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
          
        }
    }
</script>