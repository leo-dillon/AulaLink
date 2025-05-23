<script setup>
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

  <RouterView />
</template>

