<template lang="">
    <div>
        <h1>List of Products</h1>

        <date-picker class="d-inline"></date-picker>
        <categories-dropdown class="d-inline"></categories-dropdown>

        <div class="row mt-5">
            <product-card class="col-sm-3 " v-for="product in products" v-bind:product="product" :key="product.id"></product-card>
        </div>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';

import categoriesDropdown from '../components/categories-dropdown.vue';
import datePicker from '../components/date-picker.vue';
import productCard from '../components/product-card.vue';

export default {
    name: 'home',
    components: {
		'categories-dropdown' : categoriesDropdown,
		'date-picker' : datePicker,
		'product-card' : productCard
	},
    mounted() {
        this.$store.dispatch('getProducts');
    },
    computed: {
        ...mapGetters(['products']),
    },
    methods:{
    }
}
</script>

<style lang="">
    
</style>