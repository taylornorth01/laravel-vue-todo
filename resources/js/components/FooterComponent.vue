<template>
	<section>
		<div v-if="metadata">
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
		<div v-else>
			Loading...
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
				this.$emit('changePage', getNextUrl(this.metadata.links));
			},

			prevPage() {
				console.log("Get previous page.");
				this.$emit('changePage', getPrevUrl(this.metadata.links));
			}
		}
	}
</script>