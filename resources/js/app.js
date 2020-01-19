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
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/index.css';

Vue.use(VueToast);


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
Vue.component('loader', require('./components/Loader.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        message: '',
        typing: '',
        chat: {
            message: [],
            users:[],
            color:[]
        },
        numberOfUsers:0,
        users:[],
        totalMessages:0,
        isGone: false
    },
    watch:{
     message(){
        Echo.private('chat')
        .whisper('typing', {
            message: this.message,
            user: Laravel.user
        });
     }
    },
    methods: {
        send() {
            if (this.message != '') {
                this.chat.message.push(this.message);
                this.chat.users.push('You');
                this.chat.color.push('success');
                this.totalMessages = this.chat.message.length
                this.message = '';
                this.isGone = true
                 Axios.post('send',{
                  message: this.chat.message[this.chat.message.length - 1]
                 })
                 .then((response) =>{
                  console.log(response);
                  this.isGone = false;
                 })
                 .catch((error) =>{
                 console.log(error);
                 this.isGone = false;
                 Vue.$toast.open({
                    message: 'Oops Looks like something went wrong make sure you have a working internet connection and try again',
                    type: 'error',
                    duration: 5000,
                    dismissible: true,
                    position:'top-right'
                });
                 })

            }
        }
    },
    mounted(){
        Echo.private('chat')
       .listen('ChatEvent', (e) => {
        this.chat.message.push(e.message);
        this.chat.users.push(e.user);
        this.chat.color.push('warning');
        this.totalMessages = this.chat.message.length
        console.log(e);
    });
    Echo.private('chat')
    .listenForWhisper('typing', (e)=>{
        if(e.message != '' && e.user != null){
            this.typing = e.user.name+' '+'is typing...'
            //console.log(e.user)
        }else{
            this.typing = '';
        }
    });

    Echo.join('chat')
    .here((users) => {
    this.users = users
    this.numberOfUsers = users.length;
    console.log(this.users)
    })
    .joining((user) => {
       this.numberOfUsers = this.numberOfUsers + 1
       this.users.push(user)
       Vue.$toast.open({
        message: user.name + ' '+'Just joined',
        type: 'success',
        duration:3000,
        position:'top-right'
    })
    })
    .leaving((user) => {
        this.numberOfUsers = this.numberOfUsers - 1
        this.users.splice( this.users.indexOf(user.name), 1 );
        Vue.$toast.open({
            message: user.name + ' '+'Just left',
            type: 'warning',
            duration:3000,
            position:'top-right'
        })
    });
    }
});
