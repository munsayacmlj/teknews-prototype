<template lang="html">
	<div class="list-of-users">
		<div v-for="user in users">
			<a :href="'/people/'+user.name">{{ user.name }}</a>
		</div>
	</div>
</template>

<script>
	
export default {	
	props: ['users'],
}
</script>

<style lang="css">
	


</style>