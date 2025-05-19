<script setup>
  import { RouterLink, RouterView } from 'vue-router'
  import HelloWorld from './components/HelloWorld.vue'
  import Header from './layout/Header.vue';
  import axios from 'axios';
  import { ref, onMounted } from 'vue';

  const mensaje = ref('');

  onMounted(async () => {
    try {
      const res = await axios.get('http://localhost:8000/saludo');
      mensaje.value = res.data.message;
    } catch (error) {
      console.error('Error al conectar con Laravel:', error);
    }
  });
</script>

<template>
 
  <Header />
  <!-- <header>
    <img alt="Vue logo" class="logo" src="@/assets/logo.svg" width="125" height="125" />

    <div class="wrapper">
      <HelloWorld msg="You did it!" />

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
      </nav>
    </div>
  </header> -->

  <RouterView />
</template>

