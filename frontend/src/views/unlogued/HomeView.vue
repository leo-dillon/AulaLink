<script setup>

import { onMounted, provide } from 'vue'
import { RouterView } from 'vue-router'
import Sidebar from '../../components/InstitutionComponents/SideBar.vue'
import axios from 'axios'


const userData = JSON.parse(localStorage.getItem('dataUser'))  
let userId

if(userData !== null){
    userId = userData.id
  }
  
  onMounted( async () => {
    if(userId){
      const userSchool = await axios.get(`${import.meta.env.VITE_API_URL}/api/user/${userId}/escuela`);
      console.log("Respuesta base", userSchool.data)
    }
    
  })
  
  provide('userData', userData)
</script>

<template>
  <main>
    <div  v-if="!userData">
      <RouterView />
    </div>
    <div v-else class="bg-gray-100 flex">
      <Sidebar escuela="userSchool"/>
      <!-- Router view => Modificación de página sin recargar -->
      <RouterView />
    </div>
     

  </main>
</template>
