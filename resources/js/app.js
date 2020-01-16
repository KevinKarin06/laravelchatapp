/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueChatScroll from 'vue-chat-scroll'
import Axios from 'axios';
Vue.use(VueChatScroll)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('message', require('./components/Message.vue').default);
Vue.component('users', require('./components/Users.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        chat: {
            message: []
        },
        users:[]
    },
    methods: {
        send() {
            if (this.message != '') {
                 Axios.post('send',{
                  message: this.message
                 })
                 .then((response) =>{
                  console.log(response);
                   this.message = '';
                 })
                 .catch((error) =>{
                 console.log(error);
                 })

            }
        }
    },
    mounted(){
        Echo.private('chat')
       .listen('ChatEvent', (e) => {
        this.chat.message.push(e.message);
        console.log(e);
    })
    }
});
