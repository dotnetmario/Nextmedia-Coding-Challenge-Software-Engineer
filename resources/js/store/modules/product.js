import axios from 'axios';

const state = {
    products: {},
};

const getters = {
    products: (state) => {
        return state.products;
    },
    productsByCategory: (state, category) => (category) => {
        return state.products.filter(prod => prod.categories.filter(cat => cat.id == category));
    }
};

const mutations = {
    set_products: (state, products) => { 
        state.products = products
    },
};

const actions = {
    getProducts : async (context, payload) => {
        let response  = await axios.get(`/api/products`)
            .catch(e => {
                console.log(e)
            });

        if(response !== undefined && response.status === 200)
            context.commit('set_products', response.data.products);
    },
};

export default {
    state, getters, actions, mutations
}