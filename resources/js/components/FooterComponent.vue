<template>
	<section>
		<div>
			<div>
				<p>Page: {{ metadata.current_page }}</p>
				<p>Tasks: {{ metadata.from }} - {{ metadata.to }}</p>
				<p>Total: {{ metadata.total }}</p>
			</div>
			<div>
				<button v-on:click="prevPage">Previous</button>
				<button v-on:click="nextPage">Next</button>
			</div>
		</div>
	</section>
</template>

<script>
	import { getNextUrl, getPrevUrl } from '../utility';

	export default {
		mounted() {
			console.log('Footer component mounted.')
		},

		props: ['metadata'],

		methods: {
			nextPage() {
				console.log("Get next page.");
				this.$emit('nextPage', getNextUrl(this.metadata.links));
			},

			prevPage() {
				console.log("Get previous page.");
				this.$emit('prevPage', getPrevUrl(this.metadata.links));
			}
		}
	}
</script>