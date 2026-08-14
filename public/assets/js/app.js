/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrapvue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('userlist', require('./components/pages/user/index.vue'));
Vue.component('usercreate', require('./components/pages/user/create.vue'));
Vue.component('useredit', require('./components/pages/user/create.vue'));


const App = new Vue({
    computed: {},
    methods: {},
    created() {
    },
    mounted() {
    },
    data() {
        return {}
    },
}).$mount('#app');
window.Apps = App;
