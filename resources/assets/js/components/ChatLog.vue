<template lang="html">
	<div class="chat-log" v-chat-scroll>
		<chat-message v-for="message in messages" :key="message.id" :message="message"></chat-message>
		<div class="empty" v-show="messages.length === 0">
			Nothing here yet!
		</div>
	</div>
</template>

<script>

var Vue = require('vue');
Vue.use(require('vue-chat-scroll'));
	
export default {
	
	props: ['messages']	

}
</script>

<style lang="css">
	
	.chat-log{
		height: 500px;
		overflow-y: auto;
	}
	
	.chat-log .chat-message:nth-child(even) {
		background-color:  #ccc;
	}

	.empty {
		padding: 1rem;
		text-align: center;
	}

</style>