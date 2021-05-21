import axios from 'axios';

const state = {
    categories: {},
};

const getters = {
    categories: (state) => {
        return state.categories;
    },
};

const mutations = {
    set_categories: (state, categories) => { 
        state.categories = categories
    },
};

const actions = {
    getCategories : async (context, payload) => {
        let response  = await axios.get(`/api/categories`)
            .catch(e => {
                console.log(e)
            });
        // console.log("heheheh", {response});

        if(response !== undefined && response.status === 200)
            context.commit('set_categories', response.data.categories);
    },
};

export default {
    state, getters, actions, mutations
}