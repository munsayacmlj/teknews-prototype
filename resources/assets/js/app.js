

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
Vue.component('list-of-users', require('./components/ListOfUsers.vue'));


const app = new Vue({
    el: '#chat',

    data: {
    	messages: [],
    	usersInRoom: []
    },

    methods: {

    	addMessage(message) {
    		//Add to existing messages
    		this.messages.push(message);

    		// Persist to database

    		axios.post('/messages', message)
    		.then(response =>{

            })
            .catch(error => {
			    console.log(error.response)
			});

    	}
    },

    created() {
    	axios.get('/messages').then(response => {
            this.messages = response.data;
    		// this.messages['msgs'] = response.data.msgs;
      //       this.messages['imgs'] = response.data.images;
      //       console.log(this.messages);
    	}); 


    	Echo.join('chatroom')
    		.here((users) => {
    			this.usersInRoom = users
                console.log('here');
    		})
    		.joining((user) => {
    			this.usersInRoom.push(user);
                console.log('joining');
    		})
    		.leaving((user) => {
    			this.usersInRoom = this.usersInRoom.filter(u => u != user);
                console.log('leaving');
    		})
    		.listen('MessagePosted', (e) => {
    			this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
    		});
    }
});
