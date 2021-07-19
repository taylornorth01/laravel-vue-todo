<template>
	<div>
		<div>
			<p>Page: {{ meta.current_page }}</p>
			<p>Tasks: {{ meta.from }}-{{ meta.to }}</p>
			<p>Total: {{ meta.total }}</p>
		</div>
		<div>
			<div @click="loadPage(links.prev)">
				Previous
			</div>
			<div @click="loadPage(links.next)">
				Next
			</div>
		</div>
	</div>
</template>

<script>
export default {
	mounted() {
		console.log("Component mounted.");
	},

	props: ["links", "meta"],

	methods: {
		loadPage(link) {
			if (link !== null) {
				console.log("Loading new page.");
				this.$emit("loadPage", link);
			} else {
				console.log("Page not avaliable.");
			}
		}
	}
};
</script>
