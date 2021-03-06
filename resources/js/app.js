/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";


Vue.use(VueRouter)

// const routes= [
// 	{
// 		path: '/demo',
// 		component: require('./components/DemoComponent.vue').default
// 	},
// 	{
// 		path: '/',
// 		component: require('./components/home.vue').default
// 	},

// ]
import {routes} from './routes';

const router = new VueRouter({
	routes
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('demos', require('./components/DemoComponent.vue').default);
Vue.component('task', require('./components/taskComponent.vue').default);
Vue.component('sidebar', require('./components/main/sidebar.vue').default);
Vue.component('master', require('./components/main/Master.vue').default);
Vue.component('home', require('./components/home.vue').default);
// Vue.component('addTask', require('./components/addModelComponent.vue').default);
// Vue.component('editTask', require('./components/editModelComponent.vue').default);
Vue.component('addStudent', require('./components/student/addModelStudentComponent.vue').default);
Vue.component('editStudent', require('./components/student/editModelStudentComponent.vue').default);
Vue.component('addLibrarian', require('./components/librarian/addModelLibrarianComponent.vue').default);
Vue.component('editLibrarian', require('./components/librarian/editModelLibrarianComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
