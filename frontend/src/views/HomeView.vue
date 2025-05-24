<script setup>
  import TheWelcome from '../components/TheWelcome.vue'
  import Sidebar from '../components/InstitutionComponents/SideBar.vue'

  import { onMounted, provide } from 'vue'
  import { RouterView } from 'vue-router'
  import axios from 'axios'

  
  const userData = JSON.parse(localStorage.getItem('dataUser'))  

  // Esto hace que se compartan los datos de padres a Hijos
  provide('userData', userData)

  onMounted( () => {
      window.addEventListener('hashchange', () => {
      const resUser = axios.get(``) 
      resUser
    })
  })

</script>

<template>
  <main>
    <div v-if="!userData">
      <TheWelcome />
    </div>
    <div v-else class="bg-gray-100 flex">
      <Sidebar  />
      <!-- Router view => Modificación de página sin recargar -->
      <RouterView />
    </div>
     

  </main>
</template>
