<template>
	<section>
		<div class="app__footer" v-if="metadata">
			<div class="page__info">
				<p>Page: {{ metadata.current_page }}</p>
				<p>Tasks: {{ metadata.from }}-{{ metadata.to }}</p>
				<p>Total: {{ metadata.total }}</p>
			</div>
			<div class="page__buttons">
				<div v-on:click="prevPage">
					Previous
				</div>
				<div v-on:click="nextPage">
					Next
				</div>
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