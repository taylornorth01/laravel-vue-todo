<template>
	<section>
		<div>
			<p>Task list</p>
			<button v-on:click="showForm">Create new task</button>

			<div v-if="isShowForm">
				<input type="text" v-model="title">
				<input type="text" v-model="text">
				<button v-on:click="createTask">Submit</button>
			</div>

		</div>
	</section>
</template>

<script>
	export default {
		mounted() {
			console.log('Header component mounted.')
		},

		data() {
			return {
				isShowForm: false,
				title: '',
				text: ''
			}
		},

		methods: {
			showForm() {
				this.isShowForm = !this.isShowForm;
			},

			createTask() {
				axios.post('/tasks', {
					task_title: this.title, 
					text_body: this.text
				})
				.then(response => console.log(response.data.message))
				.catch(error => console.log(error));

				this.title = '';
				this.text = '';
				this.showForm();

				this.$emit('redirectPage');
			}
		}
	}
</script>