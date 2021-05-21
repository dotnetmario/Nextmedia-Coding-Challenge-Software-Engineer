<template>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" id="categories-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
        </button>
        <ul class="dropdown-menu" aria-labelledby="categories-dropdown">
            <li v-for="cat in categories" :key="cat.id">
                <a href="#" class="dropdown-item" v-on:click="filterByCategory" :data-categoryid="cat.id">{{ cat.name }}</a>
            </li>
        </ul>
    </div>
</template>

<script>
import {mapGetters} from 'vuex';

export default {
    name: "categories-dropdown",
    mounted() {
        this.$store.dispatch('getCategories');
    },
    computed: {
        ...mapGetters(['categories']),
    },
    methods: {
        filterByCategory (event) {
            event.preventDefault();

            let val = event.target.attributes['data-categoryid'].value;
            this.$emit('filterProdByCategory', val);
        }
    }

}
</script>