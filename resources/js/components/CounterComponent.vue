<template>
    <section>

      <p v-if="counter > 0">
        The current count is {{ counter }}
      </p>

      <p v-else>
        These currently is no count :(
      </p>

      <!-- <button v-on:click="counter++">
        Increment counter
      </button> -->

      <button v-on:click="incrementCount()">
        Increment counter
      </button>
      
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
          return {
            counter: 0,
          }
        },

        methods: {
          incrementCount() {
            this.counter++;
            console.log("Incremented count!!");
          }
        }
    }
</script>