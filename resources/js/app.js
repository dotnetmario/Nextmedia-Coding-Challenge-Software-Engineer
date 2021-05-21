
import './bootstrap';
import Vue from 'vue';
// app routes
import router from './routes.js';
// state management
import store from './store/index.js';

window.Vue = Vue;

// import { component } from 'vue/types/umd';
// Vue.config.devtools = false;

import App from './pages/App';


const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App),
});

export default app;