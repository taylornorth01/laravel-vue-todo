<template>
	<section>
		<div>
			<div>
				<p>Page: {{ metadata.current_page }}</p>
				<p>Tasks: {{ metadata.from }} - {{ metadata.to }}</p>
				<p>Total: {{ metadata.total }}</p>
			</div>
			<div>
				<button>Previous</button>
				<button>Next</button>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		mounted() {
			console.log('Footer component mounted.')
		},

		props: ['metadata']
	}
</script>