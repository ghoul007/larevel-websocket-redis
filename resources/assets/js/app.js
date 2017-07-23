/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


import Echo from "laravel-echo";

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
});


e.channel('chan-demo')
    .listen('PostCreatedEvent', (e) => {
        console.log('--', e);
    });

window.demo = e.join('group.1')
    .here(function(usr){
        console.log('log here',usr)
    })
    .joining(function(usr){
        console.log('log joining',usr)
    })
    .leaving(function(usr){
        console.log('log leaving',usr)
    });


e.private('App.user.1').notification(function (notification) {
    console.log(notification)
});
//     .listenForWhisper('test', function (e) {
//         console.log('log chuchotement', e)
//     })
// ;


$('#demo').click(function (e) {
    e.preventDefault();
    $.get('/post');
});


// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
