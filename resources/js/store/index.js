import Vuex from 'vuex';
import Vue from 'vue';

// mpdules
import category from './modules/category.js';
import product from './modules/product.js';

// load Vuex
Vue.use(Vuex);

// Create store
export default new Vuex.Store({
    modules: {
        category,
        product
    }
});
