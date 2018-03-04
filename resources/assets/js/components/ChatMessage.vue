<template lang="html">
	<div class="chat-message pl-3">
		<div class="pb-1 pt-1">{{ message.message }}</div>
		<small class="pb-2">by {{ message.user.name }} {{ moment(message.created_at) }}</small>
	</div>
</template>

<script>

var moment = require('moment');
window.moment = require('moment');

export default {

	props: ['message'],

	// data: {
	// 	image_src: ''
	// },

	methods: {
		moment: function(date) {
			return moment(date).format('lll');
		}
	}

}
</script>

<style lang="css">
	

</style>