<template>
  <section>
    <ul>
      <li v-for="task in tasks" :key="task.id" >
        <task-component 
          v-bind:task="task" 
          v-on:refreshList="$emit('refreshList')">
        </task-component>
      </li>
    </ul>
  </section>
</template>

<script>
  export default {
    mounted() {
      console.log('List component mounted.');
    },

    props: ['tasks'],
  }
</script>