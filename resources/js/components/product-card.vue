<template>
    <div class="card" style="width: 18rem;">
        <img :src="product.image.replace('public', '')" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ product.name }}</h5>
            <p class="card-text">{{ product.description.substr(0, 300) }} ...</p>
            <span class="btn btn-primary">{{ product.price }}</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "product-card",
    props: ['product'],
}
</script>