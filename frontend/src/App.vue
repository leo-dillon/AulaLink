<script setup>
    import Header from './layout/Header.vue';
    import Footer from './layout/Footer.vue';
</script>

<template>
    <Header />
    <div class="py-24 bg-gray-100">
        <RouterView />
    </div>
    <Footer />
</template>

