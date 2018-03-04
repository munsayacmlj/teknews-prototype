<template lang="html">
	<div class="chat-composer mt-2">
		<input type="text" placeholder="Start typing your message..." v-model="messageText" @keydown.enter="sendMessage">
		<button class="btn btn-primary" @click="sendMessage">Send</button>
	</div>
</template>

<script>
	
export default {
	props: ['currentUser'],
	data() {
		return {
			messageText: ''
		}
	},

	methods: {
		sendMessage() {
			this.$emit('messagesent', {
	 			message : this.messageText,
	 			user : {
	 					name: this.currentUser
	 			}
	 		});
			this.messageText = ''
		}
	}

}
</script>

<style lang="css">
	
	.chat-composer{
		display: flex;
	}

	.chat-composer input{
		flex: 1 auto;
	}
	
	.chat-composer button{
		border-radius: 0;
	}

</style>