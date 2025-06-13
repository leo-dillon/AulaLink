<script setup>
    import Header from './layout/Header.vue';
    import Footer from './layout/Footer.vue';
</script>

<template>
  <Header />
  <div class="relative pt-20 min-h-screen bg-gray-100 overflow-hidden">
    <div
      class="absolute inset-0 z-0"
      style="
        background-image: url('/img/trama-2.png');
        background-size: 600px;
        background-position: center;
        background-repeat: repeat;
        mix-blend-mode: lighten;
        background-color: rgba(255, 255, 255, 0.8);
      "
    ></div>
    
    <div class="relative z-10">
      <RouterView />
    </div>
  </div>
  <Footer />
</template>




